<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\User;
use App\Models\Room;
use App\Models\Professor;
use App\Models\Module;
use App\Models\Course;

use Illuminate\Http\Request;

class EditController extends Controller
{
	public function user()
	{
		$attributes = request()->validate([
			'user_username' => 'required|max:255',
			'user_name' => 'required|max:255',
			'user_role' => 'required',
			'user_email' => 'required|max:255',
			'user_created_at' => 'required'
		]);

		User::update($attributes);

		return back()->with('success', 'Benutzer update');
	}

	public function room()
	{
		$attributes = request()->validate([
			'room_name' => 'required|max:255',
			'room_slug' => 'required',
			'room_building_id' => 'required|max:255',
			'room_created_at' => 'required',
			'room_updated_at' => 'required'
		]);

		Room::update($attributes);

		return back()->with('success', 'Raum update');
	}

	public function professor()
	{
		$attributes = request()->validate([
			'prof_picture_path' => 'required',
			'prof_name' => 'required|max:255',
			'prof_created_at' => 'required',
			'prof_updated_at' => 'required'
		]);

		Professor::update($attributes);

		return back()->with('success', 'Professor update');
	}

	public function module()
	{
		$attributes = request()->validate([
			'module_name' => 'required|max:255',
			'module_room_id' => 'required',
			'module_professor_id' => 'required',
			'module_course_id' => 'required',
			'module_created_at' => 'required'
		]);

		Module::update($attributes);

		return back()->with('success', 'Modul update');
	}

	public function courses()
	{
		$attributes = request()->validate([
			'course_name' => 'required|max:255',
			'course_buidling_id' => 'required',
			'course_created_at' => 'required'
		]);

		Course::update($attributes);

		return back()->with('success', 'Kurs update');
	}

	public function building()
	{
		$attributes = request()->validate([
			'building_name' => 'required',
			'building_created_at' => 'required',
		]);

		Building::update($attributes);

		return back()->with('success', 'Gebäude update');
	}
}
