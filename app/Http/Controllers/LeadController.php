<?php
namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Status;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function showForm()
    {
        return view('lead.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^\+?[0-9\s\-\(\)]+$/', 'min:10', 'max:20'],
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
        ]);

        $status = Status::where('name', 'Новый')->first();

        if (!$status) {
            throw new \Exception('Статус "Новый" не найден в базе данных.');
        }

        Lead::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'status_id' => $status->id,
        ]);

        return redirect()->back()->with('success', 'Ваша заявка была успешно отправлена!');
    }

    public function index()
    {
        $newLeadsCount = Lead::where('status_id', 1)->count();
        $inProgressLeadsCount = Lead::where('status_id', 2)->count();
        $completedLeadsCount = Lead::where('status_id', 3)->count();

        $leads = Lead::with('status')->get();
        $statuses = Status::all();
        return view('lead.index', compact('leads', 'statuses', 'newLeadsCount', 'inProgressLeadsCount', 'completedLeadsCount'));
    }

    public function edit(Lead $lead)
    {
        $statuses = Status::all();
        return view('lead.edit', compact('lead', 'statuses'));
    }

    public function update(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
            'status_id' => 'required|exists:statuses,id',
        ]);

        try {
            $lead->update($validated);
        } catch (\Exception $e) {
            // Ловим исключение и выводим его сообщение
            dd($e->getMessage());
        }

        return redirect()->route('leads.index')->with('success', 'Лид успешно обновлен!');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Лид успешно удален!');
    }

    public function create()
    {
        $statuses = Status::all();
        return view('lead.create', compact('statuses'));
    }

    public function updateStatus(Request $request)
    {

        $lead = Lead::find($request->input('id'));

        if ($lead) {
            $lead->status_id = $request->input('status_id');
            $lead->save();

            // Добавляем флэш-сообщение
            return redirect()->back()->with('success', 'Статус успешно изменен!');
        }

        return response()->json(['success' => false, 'message' => 'Лид не найден'], 404);
    }

}
