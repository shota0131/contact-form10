<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                  ->orWhere('last_name', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7)->appends($request->query());

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.show', compact('contact'));
    }

    public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                  ->orWhere('last_name', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        $csv = '';
        foreach ($contacts as $contact) {
            $csv .= "{$contact->id},{$contact->first_name},{$contact->last_name},{$contact->email},{$contact->gender},{$contact->type}\n";
        }

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="contacts.csv"');
    }
}
