<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Games;
use App\Promo;
use App\PromoUse;
use App\Stats;
use Auth;
use Carbon\Carbon;
use Redirect;

class PagesController extends Controller
{
    //const merchant_id = '59723'; //free-kassa34257
    const merchant_id = '34257'; //free-kassa34257
    //const merchant_secret_1 = '3gwt040e'; //free-kassahcswwb8r
    const merchant_secret_1 = 'hcswwb8r'; //free-kassahcswwb8r
    //const merchant_secret_2 = '3lmo6icw'; //free-kassaqdqgy649
    const merchant_secret_2 = 'qdqgy649'; //free-kassaqdqgy649

    const DEF_CASE_PRICE = 59;
    const RANDOM_PROCENT = 5;
    const RANDOM_PROCENT2 = 50; // DLja bota
    const REFERALL_ADD_PROCENT = 2;


    const BOT_PROCENT = 45;
    const BOT_PROCENT_YT = 90;

    const BOT_OPEN_PROCENT_1 = 70;
    const BOT_OPEN_PROCENT_2 = 30;
    const BOT_OPEN_PROCENT_3 = 5;
    const BOT_OPEN_PROCENT_4 = 3;

    //TODO cena itemiem un shans
    public function delete_bot(){
        $bot2 = User::where('bot',1)->get();
        $BOT_IDS = [];

        foreach($bot2 as $b){
            $BOT_IDS[] = $b->id;
        }

        foreach ($BOT_IDS as $bot){
            \DB::table('games')->where('user', $bot)->delete();
        }
    }
    public function bot(){
        $bot = User::where('bot',1)->orderByRaw("RAND()")->first();
        $bot_name = $this->generatename();
        $bot_avatar = $this->generateavatar();

            $random = mt_rand(1,100);
            if($random < self::RANDOM_PROCENT2){
                $win = \DB::table('items')->where('type','random')->inRandomOrder()->first();
            }else{
                $win = \DB::table('items')->where('case',0)->inRandomOrder()->first();
            }

        $bot->username = $bot_name;
        $bot->avatar = $bot_avatar;
        $bot->save();

        \DB::table('games')->insert(
            [
                'user' => $bot->id,
                'case' => 'def',
                'win_item' => $win->id,
                'code' => 'CODE',
                'status' => 1
            ]);
        return response()->json(['status' => 'success']);
    }

    public function generatename(){
        $BOT_NAMES = ['Андреев Алексей','Зорин Никита','Кирилов Вадим','Морщинин Евгений','Зинченко Виктор','Павлычев Женя','Новик Дима','Сыропятов Егор','Фатхуллин Данис','Сенцов Дима','Фатыхов Айдар','Николаев Женя','Никитин Николай','Петров Евгений','Павленко Влад','Иванов Евгений','Агальцов Юрий','Зайцев Дмитрий','Кислицын Лёха','Mazepa Yaroslav','Ридевский Женя','Субботин Сергей','Марьев Илья','Мадмаев Женя','Кислов Алексей','Петров Павел','Дарьин Игорь','Агафьев Артём','Жмурин Иван','Булочкин Антон','','Пулькин Евгений','Столов Андрей','Трубкин Кирилл','Пятничный Дмитрий','Войнов Сергей','Палкин Олег','Antonov Evgeniy','Коробник Женя','Булкин Иван','Артёр Перожков','Ключкин Иван','Столяр Андрей','Иванов Никита','Александров Артём','Золкин Илья','Круглов Стас','Батарейкин Илья','Клубника Андрей','Спиннер Савелий','Алексеев Олег','Зарядкин Иван','Климон Александр','Квадратов Вячеслав','Федосов Влад'];
        $k = array_rand($BOT_NAMES);
        $bot_name = $BOT_NAMES[$k];
        return $bot_name;
    }
    public function generateavatar(){
        $BOT_AVATAR = \DB::table('users')->where('id','>',1)->orderByRaw("RAND()")->first();
        $k = $BOT_AVATAR->avatar;
        return $k;
    }

    public function promo(Request $r){
        $code = Promo::where('code',$r->code)->first();
        $user = User::where('id',$r->user)->first();

        if(count($code) == 0){
            //code doesnt exist
            return response()->json(['status' => 'false','error' => 'Код не существует!']);
        }else{
            if($code->used + 1 <= $code->limit){
                $use = PromoUse::where('user',$user->id)->where('code',$r->code)->first();
                if(count($use) != 0){
                    //used
                    return response()->json(['status' => 'false','error' => 'Вы уже использовали этот код!']);
                }else{
                    $user->money = $user->money + $code->reward;
                    $user->save();
                    PromoUse::create([
                        'user' => $user->id,
                        'code' => $code->code,
                    ]);
                    $code->used = $code->used + 1;
                    $code->save();
                    return response()->json(['status' => 'true','balance' => $user->money]);
                }
                //success
            }else{
                //too many used
                return response()->json(['status' => 'false','error' => 'Слишком много людей использовали этот код, лиммит достигнут '.$code->limit.'/'.$code->limit]);
            }
        }
    }

    public function success(){
        return Redirect::to('/');
    }

    public function feedback(){
        $time = Carbon::now();
        return view('pages.feedback', compact('time'));
    }
    public function faq(){
        $time = Carbon::now();
        return view('pages.faq', compact('time'));
    }

    function getIP() {
        if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
        return $_SERVER['REMOTE_ADDR'];
    }

    public function getPayment(Request $request){
        if (!in_array($this->getIP(), array('136.243.38.147', '136.243.38.149', '136.243.38.150', '136.243.38.151', '136.243.38.189', '88.198.88.98'))) {
            return "Ip nneatbilst";
        }

        $sign = md5(self::merchant_id.':'.$request->AMOUNT.':'.self::merchant_secret_2.':'.$request->MERCHANT_ORDER_ID);

        if($sign != $request->SIGN){
            return "Signi neatbilst";
        }
        $payment=   \DB::table('payments')
            ->where('id', $request->MERCHANT_ORDER_ID)->first();
        if(count($payment) == 0){
            return "Neatrada bd";
        }else{
            if($payment->status != 0){
                return "Status nav 0";
            }else{
                if($payment->amount != $request->AMOUNT){
                    return "Summa neatbilst";
                }else{
                    $user = User::where('id', $payment->user)->first();
                    $user->money = $user->money + $payment->amount;
                    $user->save();

                    $te = User::where('ref_code', $user->ref_use)->first();
                    if(count($te) == null ||count($te) == 0){

                    }else{
                        $bon = (self::REFERALL_ADD_PROCENT/100)*$payment->amount;
                        $te->money =   $te->money + $bon;
                        $te->save();
                    }
                    \DB::table('payments')
                        ->where('id', $payment->id)
                        ->update(['status' => 1]);
                    echo 'YES';
                }
            }
        }
    }
    public function oplata(Request $r){
        $type = $r->type_curr;
        $amount = $r->sum;

        if($type  != null || $type  !== 'undefined' || $type  != '' ){
            if((int)$amount < 1){
                $amount = 99;
            }

            $int_id =  \DB::table('payments')->insertGetId([
                'amount' => (int)$amount,
                'user' => $this->user->id,
                'time' => time(),
                'status' => 0,
                
            ]);
            $orderID = $int_id;

            $sign = md5(self::merchant_id.':'.$amount.':'.self::merchant_secret_1.':'.$orderID);
                $url = 'http://www.free-kassa.ru/merchant/cash.php?m='.self::merchant_id.'&oa='.$amount.'&o='.$orderID.'&s='.$sign.'&lang=ru';

            if( $type == ''){
                $time = Carbon::now();
                return view('pages.oplata', compact('time'));
            }else{
                return redirect($url);
            }
            //$url = 'http://www.free-kassa.ru/merchant/cash.php?m='.self::merchant_id.'&oa='.$amount.'&o='.$orderID.'&s='.$sign.'&lang=ru';
        }else{
            $time = Carbon::now();
            return view('pages.oplata', compact('time'));
        }
    }
    public function account(){
        if(!Auth::check()){
            return Redirect::to('/login');
        }else{
            $time = Carbon::now();
            $drops = \DB::table('games')->where('user',Auth::user()->id)->limit(2000)->orderBy('id', 'desc')->get();
            foreach($drops as $drop){
                $as = \DB::table('items')->where('id',$drop->win_item)->first();
                $drop->key = $drop->code;
                $drop->image = $as->image;
            }
            return view('pages.account', compact('drops','time'));
        }
    }
    public function buy2(Request $r){
        $type = $r->rulet_reload;

        if($type == 'def'){
                $item = \DB::table('items')->where('id','>',0)->limit(30)->inRandomOrder()->get();
                $item2 = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                $a = [];
                foreach($item as $a1){
                    $r = mt_rand(1,2);
                    if($r == 1){
                        $a[] = [$item2];
                    }else{
                        $a[] = [$a1];
                    }
                }

                $random = mt_rand(1,100);
                if($random < self::RANDOM_PROCENT){
                        $win = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                }else{
                    $win1 = \DB::table('items')->where('id','>',0)->limit(30)->inRandomOrder()->first();
                    $stock = \DB::table('stock')->where('game',$win1->name)->limit(1)->first();
                    if(count($stock) == 0|| count($stock) == null){
                        $stock2 = \DB::table('stock')->where('type','random')->limit(1)->first();
                        if(count($stock2) == 0|| count($stock2) == null) {
                            return response()->json(['error' => 'stock']);
                        }else{
                            $win = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                        }
                    }else{
                        $win = \DB::table('items')->where('name',$win1->name)->inRandomOrder()->first();
                    }
                }
                $inserted = [array($win)]; // Not necessarily an array
                array_splice( $a, 26, 0, $inserted ); // splice in at position 3

                //return array($win);
                return response()->json(['item' => $a,'win' => $win->id]);

        }else{
            $case = \DB::table('cases')->where('name',$type)->first();
                $item = \DB::table('items')->where('case',$case->id)->first();
                $item2 = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                $a = [];
                for ($x = 0; $x <= 30; $x++) {
                    $r = mt_rand(1,2);
                    if($r == 1){
                        $a[] = [$item2];
                    }else{
                        $a[] = [$item];
                    }
                }
                $random = mt_rand(1,100);
                if($random < 1){
                        $win = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                }else{
                        $win = \DB::table('items')->where('case',$case->id)->first();
                }
                $inserted = [array($win)]; // Not necessarily an array
                array_splice( $a, 26, 0, $inserted ); // splice in at position 3
                //return array($win);
            return response()->json(['item' => $a,'win' => $win->id]);

        }
    }

    public function buy(Request $r){
        $user = User::where('id', $r->user)->first();
        $type = $r->rulet_reload;

        if($type == 'def'){
            if(!Auth::check()){
                return response()->json(['error' => 'login']);
            }else if($user->money < self::DEF_CASE_PRICE){
                return response()->json(['error' => 'money']);
            }else{
                $item = \DB::table('items')->where('id','>',0)->limit(30)->inRandomOrder()->get();
                $item2 = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                $a = [];
                foreach($item as $a1){
                    $r = mt_rand(1,2);
                    if($r == 1){
                        $a[] = [$item2];
                    }else{
                        $a[] = [$a1];
                    }
                }

                $random = mt_rand(1,100);
                if($random < self::RANDOM_PROCENT){
                    $stock = \DB::table('stock')->where('type','random')->limit(1)->first();
                    if(count($stock) == 0|| count($stock) == null) {
                        return response()->json(['error' => 'stock']);
                    }else{
                        $win = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                        $code = \DB::table('stock')->where('type','random')->inRandomOrder()->first();
                    }
                }else{
                    $win1 = \DB::table('items')->where('id','>',0)->limit(30)->inRandomOrder()->first();
                    $stock = \DB::table('stock')->where('game',$win1->name)->limit(1)->first();
                    if(count($stock) == 0|| count($stock) == null){
                        $stock2 = \DB::table('stock')->where('type','random')->limit(1)->first();
                        if(count($stock2) == 0|| count($stock2) == null) {
                            return response()->json(['error' => 'stock']);
                        }else{
                            $win = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                            $code = \DB::table('stock')->where('type','random')->inRandomOrder()->first();
                        }
                    }else{
                        $win = \DB::table('items')->where('name',$win1->name)->inRandomOrder()->first();
                        $code = \DB::table('stock')->where('game',$win->name)->inRandomOrder()->first();
                    }
                }
                $inserted = [array($win)]; // Not necessarily an array
                array_splice( $a, 26, 0, $inserted ); // splice in at position 3


                Games::create([
                    'user' => $user->id,
                    'case' => 'def',
                    'win_item' => $win->id,
                    'code' => $code->key,
                    'status' => 0
                ]);
                $user->money = $user->money - self::DEF_CASE_PRICE;
                $user->save();
                \DB::table('stock')->where('key', $code->key)->delete();
                //return array($win);
                return response()->json(['item' => $a]);
            }

        }else{
            $case = \DB::table('cases')->where('name',$type)->first();
            if(!Auth::check()){
                return response()->json(['error' => 'login']);
            }else if($user->money < $case->price){
                return response()->json(['error' => 'money']);
            }else {
                $item = \DB::table('items')->where('case',$case->id)->first();
                $item2 = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                $a = [];
                for ($x = 0; $x <= 30; $x++) {
                    $r = mt_rand(1,2);
                    if($r == 1){
                        $a[] = [$item2];
                    }else{
                        $a[] = [$item];
                    }
                }
                $random = mt_rand(1,100);
                if($random < self::RANDOM_PROCENT){
                    $stock = \DB::table('stock')->where('type','random')->limit(1)->first();
                    if(count($stock) == 0|| count($stock) == null) {
                        return response()->json(['error' => 'stock']);
                    }else{
                        $win = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                        $code = \DB::table('stock')->where('type','random')->inRandomOrder()->first();
                    }
                }else{
                    $win1 = \DB::table('items')->where('case',$case->id)->first();
                    $stock = \DB::table('stock')->where('game',$win1->name)->limit(1)->first();
                    if(count($stock) == 0|| count($stock) == null){
                        $stock2 = \DB::table('stock')->where('type','random')->limit(1)->first();
                        if(count($stock2) == 0|| count($stock2) == null) {
                            return response()->json(['error' => 'stock']);
                        }else{
                            $win = \DB::table('items')->where('type','random')->inRandomOrder()->first();
                            $code = \DB::table('stock')->where('type','random')->inRandomOrder()->first();
                        }
                    }else{
                        $win = \DB::table('items')->where('case',$case->id)->first();
                        $code = \DB::table('stock')->where('game',$win->name)->inRandomOrder()->first();
                    }
                }
                $inserted = [array($win)]; // Not necessarily an array
                array_splice( $a, 26, 0, $inserted ); // splice in at position 3
                \DB::table('games')->insert(
                    ['user' => $user->id,
                        'case' => $type,
                        'win_item' => $win->id,
                        'code' => $code->key,
                        'status' => 0]
                );
                $user->money = $user->money - $case->price;
                $user->save();
                \DB::table('stock')->where('key', $code->key)->delete();
                //return array($win);
                return response()->json(['item' => $a]);
            }
        }
    }


    public function demok($id) {
        $case = \DB::table('cases')->where('id',$id)->first();
        $items = \DB::table('items')->where('case', $id)->orderBy('price', 'desc')->first();
        $time = Carbon::now();
        return view('pages.demok', compact('case','items','time'));
    }
    public function cases($id){
        $case = \DB::table('cases')->where('id',$id)->first();
        $items = \DB::table('items')->where('case', $id)->orderBy('price', 'desc')->first();
        $time = Carbon::now();
        return view('pages.case', compact('case','items','time'));
    }
    public function update(Request $r){
        $user = User::where('id', $r->user)->first();
        \DB::table('games')->where('status', 0)
            ->where('user', $user->id)
            ->update(['status' => 1]);
    }
    public function getWin2(Request $r){
        $type = $r->genre_name;
        $item = \DB::table('items')->where('id',$r->win_item)->first();
        return response()->json(['item' => $item]);

        //return response()->json(['error' => 1, 'item' => $item]); //JA error

    }
    public function getWin(Request $r){
        $user = User::where('id', $r->user)->first();
        $game = \DB::table('games')->where('user',$user->id)->where('status', 0)->limit(1)->first();
        $type = $r->genre_name;
        $item = \DB::table('items')->where('id',$game->win_item)->first();
        \DB::table('games')
            ->where('user', $user->id)
            ->where('status', 0)
            ->update(['status' => 1]);
        return response()->json(['item' => $item]);

        //return response()->json(['error' => 1, 'item' => $item]); //JA error

    }
    public function getStats(){
        $games = \DB::table('games')->where('id', '>', 0)->count();
        $user = User::where('id', '>', 1)->count();
        return response()->json(['users' => $user, 'games' => $games]);
    }

    public function last(){

        $game = Games::where('status',1)->exclude(['code'])->limit(20)->orderBy('id', 'DESC')->get();
        foreach ($game as $g) {
            $user = User::where('id', $g->user)->first();
            $item = \DB::table('items')->where('id',$g->win_item)->first();
            $g->name = $user->username;
            $g->image = $item->image;
            $g->time = $g->created_at;
        }
        return $game;
    }

    public function price(){
        $items = \DB::table('items')->where('id', '>', 0)->orderBy('price','DESC')->get();
        $time = Carbon::now();
        return view('pages.price', compact('items','time'));
    }

    public function index(Request $r){
        if($r->r != null){
            if(!Auth::check()){

            }else{
                $this->refuseurl($r->r);
            }
        }
        $cases = \DB::table('cases')->where('id', '>', 0)->inRandomOrder()->get();
        $time = Carbon::now();
        return view('pages.index', compact('cases','time'));
    }
    public function demo(Request $r){
        $cases = \DB::table('cases')->where('id', '>', 0)->inRandomOrder()->get();
        $time = Carbon::now();
        return view('pages.demo', compact('cases','time'));
    }
    public function refuseurl($code2)
    {
        $code = \DB::table('users')->where('ref_code', $code2)->first();
        if (Auth::user()->ref_use !== NULL) {
            return 'Code used';
        } else if ($code == NULL) {
            return 'Code null';
        } else if (Auth::user()->ref_code == $code2) {
            return 'Code user';
        } else {
            $user = User::find(Auth::user()->id);
            $user->money = $user->money + 5;
            $user->ref_use = $code2;
            $user->save();
            return redirect('/login');
        }
    }

}
