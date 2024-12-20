<?php

namespace App\Http\Controllers;

use App\Models\computers;
use App\Models\issues;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    //Hiển thị danh sách các vấn đề
    public function index()
    {
        $issues = issues::with('computer')->paginate(10); // Phân trang 10 bản ghi
        return view('issues.index', compact('issues'));
    }

    //Hiển thị form thêm máy tính
    public function create()
    {
        $computers = computers::all();
        return view('issues.create', compact('computers'));
    }

    //Lưu máy tính mới
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        issues::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    //Hiển thị form sửa máy tính
    public function edit($id)
    {
        $issues = issues::findOrFail($id);
        $computers = computers::all();
        return view('issues.edit', compact('issues', 'computers'));
    }

    //Hiển thị form cập nhật máy tính
    public function update(Request $request, string $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issues = issues::find($id);

        $issues->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật!');
    }

    //Hiển thị form xóa máy tính
    public function destroy($id)
    {
        $issues = issues::findOrFail($id);
        $issues->delete();
    return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa!');
    }
}
