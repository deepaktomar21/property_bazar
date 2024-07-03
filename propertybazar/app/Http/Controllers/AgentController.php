<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\Support\Facades\Validator;


class AgentController extends Controller
{
    public function agentIndex(Request $request)
    {
        $search = $request->input('search');

        $query = Agent::query();
        if ($search) {
            $query->where('id', $search)
                  ->orWhere('agent_name', 'LIKE', "%{$search}%")
                  ->orWhere('membership_id', 'LIKE', "%{$search}%");
        }

        $agents = $query->paginate(5);

        return view('admin.agent.list', [
            'agents' => $agents,
            'search' => $search,
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if (empty($ids) || !is_array($ids)) {
            return response()->json(["error" => "Invalid input."], 400);
        }

        Agent::whereIn('id', $ids)->delete();

        return response()->json(["success" => "Agents have been deleted"]);
    }



    public function agentStore(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validationRules());

        if ($validator->passes()) {
            $agent = new Agent();
            $this->saveAgent($agent, $request);

            session()->flash('success', 'Agent added successfully');

            return redirect()->route('admin.agent.list');
        } 
    }

    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        return view('admin.agent.edit', ['agent' => $agent]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->validationRules());

        if ($validator->passes()) {
            $agent = Agent::findOrFail($id);
            $this->saveAgent($agent, $request);

            session()->flash('success', 'Agent updated successfully');

            return redirect()->route('admin.agent.list');
        } else {
            return redirect()->route('admin.agent.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function agentDestroy($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->delete();
        return back();
    }

    public function agentShow($id)
    {
        $agent = Agent::findOrFail($id);
        return view('admin.agent.show', ['agent' => $agent]);
    }

    private function validationRules()
    {
        return [
            'agent_name' => 'required',
            'membership_id' => 'required',
            'rera_no' => 'required',
            'city' => 'required',
            'zones' => 'required',
            'area' => 'required',
            'company' => 'required',
            'working_area' => 'required',
            'deal_in' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'end_date' => 'required|date',
        ];
    }

    private function saveAgent(Agent $agent, Request $request)
    {
        $agent->agent_name = $request->agent_name;
        $agent->membership_id = $request->membership_id;
        $agent->rera_no = $request->rera_no;
        $agent->city = $request->city;
        $agent->zones = $request->zones;
        $agent->area = $request->area;
        $agent->company = $request->company;
        $agent->working_area = $request->working_area;
        $agent->deal_in = $request->deal_in;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->end_date = $request->end_date;
        $agent->save();
    }
}
