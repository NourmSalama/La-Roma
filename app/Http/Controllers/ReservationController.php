<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    public function overview()
    {
        // Pak alle tabbelen van de reservering
        $reservations = Reservation::all();


        // Pak alle tabbelen van de reservering
        return view('reservation.overview', compact('reservations'));

    }

    public function index()
    {
        // Pak alle tabbelen van de reservering
        $reservations = Reservation::all();

        // Pak alle tabbelen van de reservering
        return view('reservation.index', compact('reservations'));

    }

    public function create()
    {
        // Return de view voor de create functie
        return view('reservation.create');
    }

    public function store(Request $request)
    {
        // Valideer alles wat er met de request is gestuurd
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=> 'required',
            'comments'=>'required',
            'allergies'=>'required',
            'date' => 'required',
        ]);

        $customer = new Customer([
            'name' => $request->get('name'),
            'email'=> $request->get('email'),
            'phone'=> $request->get('phone'),
        ]);

        $customer->save();

        // Maak een nieuwe reservatie aan
        $reservation = new Reservation([
            'customer_id' => $customer->id,
            'comments'=> $request->get('comments'),
            'allergies'=> $request->get('allergies'),
            'date' => $request->get('date')
        ]);

        // Sla de reservatie op

        $reservation->save();

        // Breng hem terug door de view
        return redirect('reservation')->with('success', 'Reservation successfully placed.');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        // Zoek welke je gaat laten zien
        $reservation = Reservation::find($id);

        // Return de pagina met het ID
        return view('reservation.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        // 1. Valideer de verstuurde data vantuit de edit form
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'comments'=>'required',
            'allergies'=>'required',
            'date' => 'required',
        ]);

        // Kijk welke id je het aangepast gaat worden
        $reservation = Reservation::find($id);
        $customer = Customer::find($id);


        // Sla alle data op en save de request
        $customer->name = $request->get('name');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $reservation->comments = $request->get('comments');
        $reservation->allergies = $request->get('allergies');
        $reservation->date = $request->get('date');

        // Sla alles op
        $reservation->save();
        $customer->save();

        // Return hem met een succes message
        return  redirect('reservation')->with('success', 'Reservation successfully updated');
    }


    public function destroy($id)
    {
        // Vind de Reservation with the ID
        $reservation = Reservation::find($id);

        // Verwijder de reservatie id
        $reservation->delete();

        // Stuur hem terug met een succes berictje
        return redirect('reservation')->with('success', 'Reservation successfully removed.');
    }

    public function invoice(Reservation $reservation)
    {
        $completedOrders = $reservation->total_price;
    }
}
