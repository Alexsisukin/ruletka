<?php

namespace App\Http\Controllers;


use App\User;
use App\Cases;
use App\Stock;
use App\Payments;
use App\Promo;
use App\PromoUse;
use Illuminate\Http\Request;
use App\Items;

class AdminController extends Controller
{
    public function index()
    {
        $drop = \DB::table('games')->orderBy('id', 'desc')->take(20)->get();
        foreach ($drop as $i) {
            $user = User::find($i->user);
            if($user != null){
              $i->username = $user->username;
              $i->user_id = $user->id;
              $i->price = $i->case;
            }
        }
        return view('admin.index', compact('drop'));
    }


    public function addPromoPost(Request $r)
    {
        \DB::table('promo')->insertGetId([
            'code' => $r->code,
            'limit' => $r->limit,
            'used' => 0,
            'reward' => $r->reward
        ]);
        return redirect('/admin/addPromo');
    }

    public function promo1($id)
    {
        $promo= Promo::find($id);
        return view('admin.promoedit', compact('promo'));
    }

    public function promoedit(Request $request)
    {
        $promo = Promo::find($request->get('id'));
        $promo->code = $request->get('code');
        $promo->limit = $request->get('limit');
        $promo->used = $request->get('used');
        $promo->reward = $request->get('reward');
        $promo->save();
        return redirect('/admin/promo');

    }
    public function addPromo()
    {
        return view('admin.addPromo');
    }
    public function promo()
    {
        $promo = \DB::table('promo')->orderBy('id', 'asc')->paginate(100);
        return view('admin.promo', compact('promo'));
    }
    public function addCase()
    {
        return view('admin.add');
    }
    public function cases()
    {
      $cases = \DB::table('cases')->orderBy('price', 'asc')->paginate(100);
        return view('admin.cases', compact('cases'));
    }
    public function caseid($id)
    {
        $case = Cases::find($id);
        return view('admin.case', compact('case'));
    }
    public function casedit(Request $request)
    {
        $case = Cases::find($request->get('id'));
        $case->name = $request->get('name');
        $case->type = $request->get('type');
        $case->price = $request->get('price');
        $case->image = $request->get('image');
        $case->save();
        return redirect('/admin/cases');

    }
    public function users()
    {
      $users = \DB::table('users')->orderBy('id', 'asc')->paginate(100);
        return view('admin.users', compact('users'));
    }
    public function search2(Request $request)
    {
        $users = User::select('users.id',
            'users.username',
            'users.avatar', 'users.money',
            'users.login',
             \DB::raw('COUNT(last_drops.user) as open_box'))->join('last_drops', 'last_drops.user', '=', 'users.id')->where('login', 'LIKE', '%' . $request->get('name') . '%')->orderby('id', 'desc')->paginate(20);
        return view('admin.users', compact('users'));

    }
    public function searchusersname(Request $request)
    {
        $users = User::select('users.id',
            'users.username',
            'users.avatar', 'users.money',
            'users.login',
             \DB::raw('COUNT(last_drops.user) as open_box'))->join('last_drops', 'last_drops.user', '=', 'users.id')->where('username', 'LIKE', '%' . $request->get('name') . '%')->orderby('id', 'desc')->paginate(20);
        return view('admin.users', compact('users'));
    }
    public function givemoney($id, Request $request)
    {
        $user = User::find($id);
        if ($request->get('money')) {
            $user->money += $request->get('money');
            $user->save();
            return redirect('/admin/users');
        }
        return view('admin.givemoney', compact('user'));
    }
    public function userid($id)
    {
        $user = User::find($id);
        return view('admin.user', compact('user'));
    }
    public function userdit(Request $request)
    {
        $user = User::find($request->get('id'));
        $user->money = $request->get('money');
        $user->username = $request->get('username');
        $user->is_admin = $request->get('is_admin');
        $user->is_yt = $request->get('is_yt');
        $user->save();
        return redirect('/admin/users');

    }
    public function ticketsave(Request $request){
      $ticket = Ticket::find($request->get('id'));
      $ticket->name = $request->get('name');
      $ticket->price = $request->get('price');
      $ticket->places = $request->get('places');
      $ticket->jackpot = $request->get('jackpot');
      $ticket->save();
      return redirect('/admin/tickets');
    }
    public function generateCase($case){
        $t = Cases::where('id',$case)->first();
        $items = explode(",", $t->items);

    foreach($items as $item2){
          $t2 = Items::where('price',$item2)->where('cases_id', $case)->get();
      if(count($t2) == null || count($t2) == 0){
          $img = '/uploads/coin-'.$item2.'.svg';
          Items::create([
              'img' => $img,
              'price' => $item2,
              'cases_id' => $t->id
          ]);
        }
      }
        $t33 = Items::where('cases_id', $case)->get();
        foreach ($t33 as $key) {
          if(in_array($key->price, $items) == 1){

          }else{
            $td = Items::where('price',$key->price)->where('cases_id',$t->id)->first();
            $td->delete();
          }
        }
    }

    public function generateGift($case){
        $t = Cases::where('id',$case)->first();
        $items = explode(",", $t->items);

    foreach($items as $item2){
      $aca = substr($item2,-1);

      if($aca == 'g'){
        $t1213 = Items::where('price','12345')->where('cases_id', $case)->get();
          if(count($t1213) == null || count($t1213) == 0){
            $img = '/uploads/gift-'.$item2.'.png';
            Items::create([
                'img' => $img,
                'price' => 12345,
                'cases_id' => $t->id
            ]);
          }
      }else{
            $t2 = Items::where('price',$item2)->where('cases_id', $case)->get();
        if(count($t2) == null || count($t2) == 0){
            $img = '/uploads/coin-'.$item2.'.svg';
            Items::create([
                'img' => $img,
                'price' => $item2,
                'cases_id' => $t->id
            ]);
          }
      }
      $t33 = Items::where('cases_id', $case)->get();
      foreach ($t33 as $key) {
        $aca = substr($item2,-1);

        if($aca == 'g'){

        }else{
          if(in_array($key->price, $items) == 1){

          }else{
            $td = Items::where('price',$key->price)->where('cases_id',$t->id)->first();
            $td->delete();
          }
        }
      }
      }
    }
    public function addCasePost(Request $r)
    {
        \DB::table('cases')->insertGetId([
            'name' => $r->name,
            'price' => $r->price,
            'type' => $r->type,
            'image' => $r->image
        ]);
        return redirect('/admin/addCase');
    }


    public function addItem()
    {
        return view('admin.addItem');
}

    public function addStock()
    {
        $cases =   \DB::table('cases')->orderBy('id', 'desc')->where('id','>',0)->get();
        $items = \DB::table('items')->orderBy('id', 'desc')->where('id','>',0)->get();
        return view('admin.stock', compact('items','cases'));
    }

    public function addStockPost(Request $r)
    {
        if($r->case == '0'){
            if($r->type == 'random'){
                $items = explode(",", $r->items);
                foreach($items as $item2){
                    Stock::create([
                        'key' => $item2,
                        'case' => $r->case,
                        'type' => $r->type,
                        'game' => 'random'
                    ]);
                }
            }else{
                $items = explode(",", $r->items);
                foreach($items as $item2){
                    Stock::create([
                        'key' => $item2,
                        'case' => $r->case,
                        'type' => $r->type,
                        'game' => $r->game
                    ]);
                }
            }
        }else{
            if($r->type == 'random'){
                $items = explode(",", $r->items);
                foreach($items as $item2){
                    Stock::create([
                            'key' => $item2,
                            'case' => $r->case,
                            'type' => $r->type,
                            'game' => 'random'
                        ]);
                    }
            }else{
                $items = explode(",", $r->items);
                foreach($items as $item2){
                    Stock::create([
                        'key' => $item2,
                        'case' => $r->case,
                        'type' => $r->type,
                        'game' => $r->game
                    ]);
                }
            }
        }

        return redirect('/admin/stock');
    }


    public function addItemPost(Request $r)
    {
        \DB::table('items')->insertGetId([
            'image' => $r->image,
            'price' => $r->price,
            'case' => $r->case,
            'name' => $r->name,
            'type' => $r->type
        ]);
        return redirect('/admin/addItem');
    }

    public function lastvvod()
    {
      $a = \DB::table('payments')->orderBy('id', 'desc')->where('status', 1)->take(20)->get();
      foreach ($a as $b) {
        $u = User::find($b->user);
        $b->name = $u->username;
        $b->name_id = $u->id;
      }

      return view('admin.lastvvod', compact('a'));
    }

    public function vivod()
    {
      $a = \DB::table('vivod')->where('status', 0)->orderBy('id', 'desc')->get();
      foreach ($a as $b) {
        $u = User::find($b->user);
        $b->name = $u->username;
        $b->name_id = $u->id;
      }
      return view('admin.vivod', compact('a'));
    }


    public function close($id)
    {
      \DB::table('vivod')->where('id', $id)->update(['status' => 1]);
      return redirect('/admin/lastvivod');
    }
    public function closegift($id)
    {
      \DB::table('last_gifts')->where('id', $id)->update(['status' => 3]);
      return redirect('/admin/vivodgifts');
    }
}
