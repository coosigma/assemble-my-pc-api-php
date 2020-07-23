<?php

namespace App\Http\Controllers;

use App\Component;

class ComponentController extends Controller
{
    public function index()
    {
        $res = Component::all();
        if (count($res) !== 0) {
            return $res;
        } else {
            return response()->json([
                "status" => "404",
                "details" => [
                    "message" => "no components founded"],
            ]);
        }
    }

    public function searchById(Component $component)
    {
        return $component;
    }

    public function searchByCategory($category)
    {
        $res = Component::where('category', '=', $category)->get();
        if (count($res) !== 0) {
            return $res;
        } else {
            return response()->json([
                "status" => "404",
                "details" => [
                    "category" => $category,
                    "message" => "no components of the category founded"],
            ]);
        }
    }
}
