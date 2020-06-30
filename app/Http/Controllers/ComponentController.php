<?php

namespace App\Http\Controllers;

use App\Component;

class ComponentController extends Controller
{
    public function index()
    {
        return Component::all();
    }

    public function searchById($id)
    {
        $component = Component::find($id);
        if ($component) {
            return $component;
        } else {
            return response()->json([
                "status" => "404",
                "details" => [
                    "id" => $id,
                    "message" => "component not found"],
            ]);
        }
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
                    "message" => "components of the category not found"],
            ]);
        }
    }
}
