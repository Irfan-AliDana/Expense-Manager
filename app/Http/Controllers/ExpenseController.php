<?php

namespace App\Http\Controllers;

use App\Events\NotifyUsers;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display's the form to add expense
    public function addExpenseForm()
    {
        return view('expense.add');
    }

    public function addExpense(Request $request)
    {
        $validate = $this->validate($request, [
            'type' => ['required', 'string'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'numeric'],
            'description' => ['string']
        ]);

        if($validate)
        {
            $userId = Auth::id();
            
            Expense::create([
                'user_id' => $userId,
                'type' => $request->type,
                'date' => $request->date,
                'amount' => $request->amount,
                'description' => $request->description
            ]);

            $message = "Alert! A new expense has been added.";

            event(new NotifyUsers($message));

            return redirect(route('addExpenseForm'))->with('success','Expense added succesfully!');
        }

    }

    // Display's the expenses on the viewExpense page 
    public function viewExpense()
    {
        $expenses = Expense::all();

        return view('expense.viewExpense', compact('expenses'));
    }

    public function updateExpenseForm($id)
    {
        $expense = Expense::findOrFail($id);

        return view('expense.update',compact('expense'));
    }

    public function updateExpense(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'type' => ['required', 'string'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'numeric'],
            'description' => ['string']
        ]);

        if($validate)
        {
            Expense::where('id','=', $id)
                ->update(['type' => $request->type, 'date' => $request->date, 'amount' => $request->amount, 'description' => $request->description]);

            return redirect(route('expense.view'))->with('update','Record updated succesfully!');
        }
    }

    public function deleteExpense($id)
    {
        $destroy = Expense::destroy($id);

        if($destroy)
        {
            return redirect(route('expense.view'))->with('delete','Expense deleted!');
        }
    }
}
