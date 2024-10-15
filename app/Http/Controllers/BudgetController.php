<?php

namespace App\Http\Controllers;
use App\Providers\AppServiceProvider;

use App\Models\Budget;
use Illuminate\Http\Request;


class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $budgets = Budget::all();
        return view('budgets.index', compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budgets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:100',
        ]);
        $b = $request->except('_token');
        $b['user_id'] = auth()->user()->id;
        $budget = Budget::create($b);
        return redirect()->route('budgets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        $operations = $budget->operations()->get();
        return view('budgets.show', compact('budget','operations'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        return view('budgets.update', compact('budget'));
      ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        $b = $request->validate([
            'name' => 'required|max:100',
        ]);
        $b  = $request->except('_token');
        $b ['user_id'] = auth()->user()->id;
        $budget->update($b );
        return redirect()->route('budgets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
       $budget->delete();
        return redirect()->route('budgets.index');
    }
}
