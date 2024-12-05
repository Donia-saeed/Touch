<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Budget;
use Illuminate\Http\Request;

class OperationController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($budgetid)
    {
        // Find the budget by id and pass it to the view for creating a new operation
        $budget = Budget::find($budgetid);
        return view('operations.create', compact('budget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $budgetid)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'amount' => 'required|numeric|min:0.01',
            // 'budget_id' => 'required|exists:budgets,id' // Validate the budget_id(input)
        ]);

        $op = $request->except('_token');
        $op['user_id'] = auth()->user()->id;
        $op['budget_id'] = $budgetid;

        $operation = Operation::create($op);

        return redirect()->route('budgets.show', $operation->budget_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        return view('operations.show'); // directory
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */

    public function edit($budgetId, $operationId)
    {
        $budget = Budget::findOrFail($budgetId);
        $operation = Operation::findOrFail($operationId);

        return view('operations.update', compact('budget', 'operation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request, Budget $budget, Operation $operation)
    {
        // Validate the request data
        $newOp = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'amount' => 'required|numeric|min:0.01',
        ]);

        // Set the budget_id and user_id in the validated data
        $newOp['budget_id'] = $budget->id;
        $newOp['user_id'] = auth()->user()->id;

        // Update the operation with the new data
        $operation->update($newOp);

        // Redirect back to the budget show page
        return redirect()->route('budgets.show', $budget->id)->with('success', 'Operation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy($budgetId, $operationId)
    {
        $operation = Operation::findOrFail($operationId);
        $operation->delete();

        return redirect()->route('budgets.show', $budgetId);
    }
}
