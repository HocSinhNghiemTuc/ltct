<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Slider\Models\Slider;
use Modules\Slider\Components\Recursive;
use Illuminate\Support\Facades\Log;
use Modules\Slider\Traits\StorageImageTrait;
use Modules\Slider\Traits\DeleteModelTrait;
use Modules\Slider\Http\Requests\SliderAddRequest;

class SliderAdminController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
    private $slider;
    public function __construct(Slider $slider) {
        $this->slider = $slider;
    }

    public function index() {
        $sliders = $this->slider->paginate(5);
        return view('slider::index', compact('sliders'));
    }

    public function create() {
        return view('slider::add');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if( !empty($dataImageSlider) ) {
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            Log::error('Error : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function edit($id) {
        $slider = $this->slider->find($id);

        return view('slider::edit', compact('slider'));
    }

    public function update(Request $request, $id) {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if( !empty($dataImageSlider) ) {
                $dataUpdate['image_name'] = $dataImageSlider['file_name'];
                $dataUpdate['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            Log::error('Error : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function delete($id) {
        $this->slider->find($id)->delete();
        return redirect()->route('slider.index');
    }

}