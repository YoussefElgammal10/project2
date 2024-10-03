<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddOrUpdateManagerRequest; 
use App\Models\Manager; 
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all(); // استرجاع جميع المدراء
        return view('managers.index', compact('managers')); // عرض المدراء في واجهة المستخدم
    }

    public function create()
    {
        return view('managers.create'); // عرض نموذج إنشاء مدير جديد
    }

    public function store(AddOrUpdateManagerRequest $request)
    {
        // التحقق من البيانات المدخلة
        $validated = $request->validated();
        
        
        $validated['password'] = bcrypt($validated['password']);

        // إنشاء مدير جديد
        Manager::create($validated);

       
        session()->flash('success', 'Manager registered successfully');

        
        return redirect()->route('managers.index'); 
    }

    public function destroy(Manager $manager)
    {
        $manager->delete(); // حذف المدير

        // إضافة رسالة نجاح
        session()->flash('success', 'Manager deleted successfully');

        // إعادة التوجيه إلى صفحة المدراء
        return redirect()->route('managers.index');
    }
}


