<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Ebook;
use App\Tag;
use App\Image;
use App\Category;
use App\User;
use App\Navbar;
use App\Footer;
use App\Sidebar;
use App\Adv;
use Auth;
use Config;

class SearchController extends Controller
{
    public function search(Request $request,$word,$from=null,$to=null){

    }
}
