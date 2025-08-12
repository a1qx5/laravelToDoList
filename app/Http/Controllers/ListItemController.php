<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class ListItemController extends Controller
{
    public function index() {
        return view('welcome')->with('items', ListItem::where('completed', false)->get());
    }

    public function saveItem(Request $request) {
        $newListItem = new ListItem;
        $newListItem->text = $request->listItem;
        $newListItem->completed = false;
        $newListItem->save();

    return redirect()->route('home');
    }

    public function markComplete($id)
    {
        $item = ListItem::findOrFail($id);
        $item->completed = true;
        $item->save();

        return redirect()->route('home');
    }
}
