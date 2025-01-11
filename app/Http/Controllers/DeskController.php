<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Session;

class DeskController extends Controller
{
    public function login()
    {
        return view("login");
    }

    function loginPost(Request $request)
    {
        $user = User::where('email', '=', 'admin')->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('/')->with("success", "Bienvenue de retour Admin, la connexion a réussi.");
            } else {
                return back()->withErrors(
                    [
                        'email' => "Email ou mot de passe incorrect."
                    ]
                )->onlyInput('email');
            }
        } else {
            return back()->withErrors([
                'email' => "Email introuvable"
            ])->withInput();
        }
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/login')->with('success', 'Vous avez été déconnecté avec succès.');
        }
        return redirect('/login');
    }
    public function updatePost(Request $request)
    {
        $user = User::where("email", "=", "admin")->first();

        $password = $request->password;
        $password_confirme = $request->password_confirme;

        if ($password === $password_confirme) {
            $user->update(
                [
                    'password' => Hash::make($request->password)
                ]
            );
            session()->flash('success', 'Mot de passe modifié avec succès.');
        } else {
            session()->flash('error', 'Les mots de passe ne correspondent pas.');
        }
        return redirect('updatepassword');
    }
    public function index()
    {
        $clients = Client::where("statut", "=", "Non Traité")->get();
        return view('index', compact('clients'));
    }
    public function confirmé()
    {
        $clients = Client::where("statut", "=", "confirmé")->get();
        return view("index", compact("clients"));
    }
    public function refusé()
    {
        $clients = Client::where("statut", "=", "refusé")->get();
        return view("index", compact("clients"));
    }

    public function add(Request $request)
    {
        Client::create(
            [
                'name' => $request->name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'type' => $request->type,
                'location' => $request->location,
                'statut' => 'Non Traité'
            ]
        );
        return redirect('/ajouter')->with('success', 'Client Ajouter avec succès !');
    }

    public function details($id)
    {
        $client = Client::with('appointments')->find($id);
        return view('details', compact('client'));
    }


    public function refuspost($id)
    {
        $client = Client::find($id);

        if ($client) {
            $client->update(
                [
                    'statut' => 'refusé'
                ]
            );
            return redirect('/details' . '/' . $id)->with('success', 'Client Modifié Statut avec succès !');
        } else {
            return redirect('/details' . '/' . $id)->with('error', 'Error, client ne trouve pas!');
        }
    }
    public function appointmentspost(Request $request)
    {
        $client = Client::find($request->client_id);

        if (!$client) {
            return redirect('/details/' . $request->client_id)->with('error', 'Client introuvable.');
        }

        try {
            Appointment::create([
                'date' => $request->date,
                'time' => $request->time,
                'client_id' => $request->client_id,
                'Commentaire' => $request->Commentaire
            ]);

            $client->update([
                'statut' => 'confirmé'
            ]);

            return redirect('/details/' . $request->client_id)->with('success', 'Rendez-vous confirmé avec succès.');
        } catch (\Exception $e) {
            return redirect('/details/' . $request->client_id)->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function updateinfoclient(Request $request)
    {
        $client = Client::find($request->client_id);

        if ($client) {
            $client->update(
                [
                    'name' => $request->name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone_number' => $request->phone_number,
                    'type' => $request->type,
                ]
            );
            return redirect('/details' . '/' . $request->client_id)->with('success', 'Client Modifié avec succès !');
        } else {
            return redirect('/details' . '/' . $request->client_id)->with('error', 'Error, client ne trouve pas!');
        }
    }
    public function updateappointments(Request $request)
    {
        $appointment = Appointment::find($request->id);

        if ($appointment) {
            $appointment->update(
                [
                    'date' => $request->date,
                    'time' => $request->time,
                    'Commentaire' => $request->Commentaire
                ]
            );
            return redirect('/details' . '/' . $request->client_id)->with('success', 'Rendez-vous Modifié avec succès !');
        } else {
            return redirect('/details' . '/' . $request->client_id)->with('success', 'Error');
        }
    }

}
