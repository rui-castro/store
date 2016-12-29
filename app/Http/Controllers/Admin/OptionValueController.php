<?php

namespace Store\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Store\Http\Controllers\Controller;
use Store\Option;
use Store\OptionValue;
use Store\Repositories\OptionRepository;

class OptionValueController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @param int $optionId the Option ID.
     * @return \Illuminate\Http\Response
     */
    public function create($optionId)
    {
        $option_value = new OptionValue();
        $option_value->option = Option::find($optionId);

        return view('admin.option_values.create', [
            'option_value' => $option_value,
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
            'option_id' => 'required|integer',
            'value' => 'required|max:255',
        ]);
        $optionId = $request->input('option_id');
        $this->options->createValue($optionId, $request->all());
        return redirect(route('admin.options.edit', ['id' => $optionId], false) . '#values');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $optionId the Option ID.
     * @param int $optionValueId the OptionValue ID.
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($optionId, $optionValueId)
    {
        return view('admin.option_values.edit', [
            'option_value' => OptionValue::find($optionValueId)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $optionId the Option ID.
     * @param int $optionValueId the OptionValue ID.
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $optionId, $optionValueId)
    {
        $this->validate($request, [
            'option_id' => 'required|integer',
            'value' => 'required|max:255',
        ]);
        $this->options->updateValue($optionValueId, $request->all());
        return redirect(
            route('admin.options.edit', ['option_id' => $optionId,], false) . '#values'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $optionId the Option ID.
     * @param int $optionValueId the OptionValue ID.
     * @return \Illuminate\Http\Response
     */
    public function destroy($optionId, $optionValueId)
    {
        OptionValue::destroy($optionValueId);
        return redirect(
            route('admin.options.edit', ['option_id' => $optionId,], false) . '#values'
        );
    }
}
