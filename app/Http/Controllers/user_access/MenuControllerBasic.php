<?php

namespace App\Http\Controllers\user_access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuControllerBasic extends Controller
{
  public function getMenu(Request $request)
  {
      // Read the menu JSON file
      $menuJson = File::disk('local')->get('menu/verticalMenu.json');
      $menu = json_decode($menuJson, true)['menu'];

      // Filter menu based on user type
      $userType = $request->user()->usertype; // Assuming user type is stored in 'type' field
      $filteredMenu = $this->filterMenuByUserType($menu, $userType);

      return response()->json(['menu' => $filteredMenu]);
  }

  private function filterMenuByUserType($menu, $userType)
  {
      $filteredMenu = [];

      if ($userType === 'Admin') {
          return $menu; // Admin has access to all menu items
      }

      foreach ($menu as $item) {
          if (isset($item['menuHeader'])) {
              // If it's a menu header, add it directly
              $filteredMenu[] = $item;
          } else {
              // For other menu items, check if they are accessible by the user type
              if (!in_array($item['slug'], ['issue-borrow-book', 'issue-return-book'])) {
                  $filteredMenu[] = $item;
              }
          }
      }

      return $filteredMenu;
  }
}
