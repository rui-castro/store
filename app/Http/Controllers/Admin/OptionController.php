<?php

namespace Store\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Store\Http\Controllers\Controller;
use Store\Option;
use Store\Repositories\OptionRepository;

class OptionController extends Controller
{
    /**
     * The OptionRepository instance.
     *
     * @var OptionRepository
     */
    protected $options;

    /**
     * Create a new controller instance.
     *
     * @param OptionRepository $options
     */
    public function __construct(OptionRepository $options)
    {
        parent::__construct();
        $this->options = $options;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.options.index', [
            'options' => $this->options->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.options.create', [
            'option' => new Option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $option = $this->options->create($request->all());
        // $option->values()->sync($request->input('values'));

        return redirect(route('admin.options.index', [], false));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.options.edit', [
            'option' => $this->options->get($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $option = $this->options->update($id, $request->all());
        //$option->options()->sync($request->input('options'));

        return redirect(route('admin.options.index', [], false));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Option::destroy($id);
        return redirect(route('admin.options.index'));
    }
}
