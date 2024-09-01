<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\QueryException;

abstract class TablesController extends Controller
{
  protected $modelClass;
  protected $data = [];

  public function __construct($modelClass, $data = [])
  {
    $this->modelClass = $modelClass;
    $this->data = $data;
    $this->data['primary'] = $this->getModel()->getKeyName();
  }

  /**
   * 
   * @return Model
   */
  protected function getModel()
  {
    return app($this->modelClass);
  }

  public function index()
  {
    $items = $this->getModel()::all();
    return view('tables.index', ['items' => $items, 'data' => $this->data]);
  }

  public function create()
  {
    $columns = $this->getModel()->getFillable();
    return view('tables.createupdate', ['columns' => $columns, 'data' => $this->data]);
  }

  protected function shouldAddTimestamps(QueryException $e)
  {
    // Check if the exception is related to missing columns
    return str_contains($e->getMessage(), 'Unknown column');
  }

  public function store(Request $request)
  {
    try {
      $this->getModel()::create($request->all());
      return redirect()->route($this->data['name_route'] . '.index');
    } catch (QueryException $e) {
      if ($this->shouldAddTimestamps($e)) {
        Schema::table($this->getModel()->getTable(), function (Blueprint $table) {
          $table->timestamps(); // Adds both 'created_at' and 'updated_at'
        });

        $this->getModel()::create($request->all());
        return redirect()->route($this->data['name_route'] . '.index');
      } else {
        throw $e;
      }
    }
  }

  public function edit($id)
  {
    $columns = $this->getModel()->getFillable();
    return view('tables.createupdate', ['id' => $id, 'columns' => $columns, 'data' => $this->data]);

  }

  public function update(Request $request, $id)
  {
    $item = $this->getModel()::findOrFail($id);
    $item->update($request->all());
    return redirect()->route($this->data['name_route'] . '.index');
  }

  public function destroy($id)
  {
    $item = $this->getModel()::findOrFail($id);
    $item->delete();
    return redirect()->route($this->data['name_route'] . '.index');
  }
}
