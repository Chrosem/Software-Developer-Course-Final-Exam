<?php

require_once(__DIR__.'/../include/autoloader.inc.php');

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PWD', '');
    define('DBNAME', 'sswl');

class User{

    private $stmt;
    public $email;

    public function __construct() {
        $this->stmt = new Stmt(HOST, USER, PWD, DBNAME);
    }

    public function registration($f_name, $l_name, $email, $bank, $cash, $pwd, $pwd_check) {
        $msg = "";

        try {
            $this->is_empty($f_name);
            $this->is_empty($l_name);
            $this->is_empty($email);
            $this->is_empty($bank);
            $this->is_empty($cash);
            $this->is_empty($pwd);
            $this->is_empty($pwd_check);

            $this->numberformat_check($bank);
            $this->numberformat_check($cash);

            $this->pwd_LengthCheck($pwd);
            $this->pwd_EqualityCheck($pwd, $pwd_check);

            $this->email_LengthCheck($email);
            $this->name_longcheck($f_name);
            $this->name_longcheck($l_name);

            $this->numbernegative_check($cash);
            $this->numbernegative_check($bank);
        }

        catch(Exception $e) {
            $msg .= $e->getMessage();
        }

        $msg .= ($this->stmt->email_Check($email)) ? " <span class='text-danger' style='font-size:25px'>A megadott Emailcímmel már regisztráltak!</span><br> " : "";

        if($msg == "") {
            $msg .= (!$this->stmt->reg_newUser($f_name, $l_name, $email, hash('sha512', $pwd))) ? " <span class='text-danger' style='font-size:25px'>Sikertelen Regisztráció! </span><br> " : "";

            if($msg == "") {
                $user_id=$this->stmt->get_UserId($email);
                $msg .= (!$this->stmt->sql_Balance($user_id,$bank,$cash)) ? " <span class='text-danger' style='font-size:25px'>Hiba történt</span><br> " : "";
            }

        }

        $msg = ($msg == "") ?
        " <h5 class='text-success'>Sikeres Regisztráció!</h5> <a class='mb-3 d-block' href='index.php' class='text-white'>Tovább a bejelentkezésre!</a>"
        : "<ul>".$msg."</ul>";

        return $msg;

    }

    public function login($email, $pwd) {
        if($this->stmt->login_DataCheck($email, hash('sha512', $pwd))) {
            session_start();

            $_SESSION['login'] = true;
            $_SESSION['userId'] = $this->stmt->get_UserId($email);
        }else {
            throw new Exception(' <h4 class="text-danger" style="font-size:25px">Hibás Email vagy Jelszó!</h4> ');
        }

    }

    public function loginCheck() {
        session_start();
        $userData = $this->stmt->get_PublicUserData($_SESSION['userId']);
            if(!empty($userData)) {
                $this->f_name = $userData['f_name'];
                $this->email = $userData['email'];
                return true;
            }

            else {
                return false;
            }

    }

    public function logout() {
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['userId']);
    }

    private function email_LengthCheck($email) {
        if(strlen($email) < 6) {
            throw new Exception(' <span class="text-danger" style="font-size:25px">A E-mail cím túl rövid! (min. 6 karakter)</span><br> ');
        } else if(strlen($email) > 64) {
            throw new Exception(' <span class="text-danger" style="font-size:25px">A E-mail cím túl hosszú! (max. 64 karakter)</span><br> ');
        }

    }

    private function pwd_LengthCheck($pwd) {
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@@#$%^&*.]{6,20}$/', $pwd)) {
            throw new Exception(' <span class="text-danger" style="font-size:25px">A jelszó nem felel meg a követelményeknek!</span><br> ');
        }

    }

    private function pwd_EqualityCheck($pwd, $pwd_check) {
        if($pwd != $pwd_check) {
            throw new Exception(' <span class="text-danger" style="font-size:25px">A két jelszó nem egyezik!</span><br> ');
        }

    }

    //User Data change
    public function user_NameUpdate($f_name, $l_name) {
        $msg = "";
        session_start();
        $user_id = $_SESSION['userId'];

        try {
            $this->is_empty($f_name);
            $this->is_empty($l_name);
            $this->name_longcheck($f_name);
            $this->name_longcheck($l_name);
        }

        catch(Exception $e) {
            $msg .= $e->getMessage();
        }

        if($msg == "") {
            $msg .= (!$this->stmt->sql_UserUpdateName($f_name, $l_name, $user_id)) ? " <span class='text-danger' style='font-size:25px'>Sikertelen Névváltoztatás! </span> " : "";
        }

        $msg = ($msg == "") ?
        " <h5 class='text-success'>Sikeres Névváltoztatás!</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;

    }

    public function user_EmailUpdate($email) {
        $msg = "";

        session_start();

        $user_id = $_SESSION['userId'];

        try {
            $this->is_empty($email);
            $this->email_LengthCheck($email);

        }

        catch(Exception $e) {
            $msg .= $e->getMessage();
        }

        $msg .= ($this->stmt->email_Check($email)) ? " <span class='text-danger' style='font-size:25px'>A megadott Emailcímmel már regisztráltak!</span><br> " : "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_UserUpdateEmail($email, $user_id)) ? " <span class='text-danger' style='font-size:25px'>Sikertelen Email cím módosítás! </span> " : "";
        }

        $msg = ($msg == "") ?
        " <h5 class='text-success'>Sikeres Email cím módosítás!"
        : "<ul>".$msg."</ul>";


        return $msg;

    }

    public function user_newpwd($pwd, $pwd_check){
        $msg="";

        session_start();

        $user_id = $_SESSION['userId'];

        try {
            $this->is_empty($pwd);
            $this->is_empty($pwd_check);
            $this->pwd_LengthCheck($pwd);
            $this->pwd_EqualityCheck($pwd, $pwd_check);

        }
        catch(Exception $e) {
            $msg .= $e->getMessage();
        }


        if($msg == "") {
            $msg .= (!$this->stmt->sql_new_pwd(hash('sha512', $pwd),$user_id)) ? " <span class='text-danger' style='font-size:25px'>Sikertelen jelszó módosítás! </span> " : "";
        }


        $msg = ($msg == "") ?
        " <span class='text-danger' style='font-size:25px'>Sikeres jelszó módosítás! </span> "
        : "<ul>".$msg."</ul>";


        return $msg;
    }

   /* Error handling */
    private function numberformat_check($value) {
        if(!is_numeric($value)) {
            throw new Exception(' <span class="text-danger" style="font-size:25px">Kérjük a megfelelő helyen számot adjon meg!</span><br> ');
        }
    }

    private function numbernegative_check($value) {
        if($value < 0 ) {
            throw new Exception(' <span class="text-danger" style="font-size:25px">Kérjük pozitív számot adjon meg!</span><br> ');
        }
    }

    private function comment_longcheck($comment) {
        if(strlen($comment) > 30) {
            throw new Exception(' <span class="text-danger" style="font-size:25px">Túl hosszú megjegyzés! Maximum 30 karakter adható meg!</span> ');
        }
    }

    private function name_longcheck($name) {
        if(strlen($name) > 20) {
            throw new Exception(' <span class="text-danger" style="font-size:25px">Túl hosszú Név! Maximum 20 karakter adható meg!</span><br> ');
        }
    }

    private function date_check($day) {
        if($day < 1 || $day > 31 ) {
            throw new Exception(' <span class="text-danger" style="font-size:25px">Helytelen nap, 1-31 között adjon meg egy számot!</span> ');
        }

    }

    private function is_empty($check){
        if(empty($check)){
            throw new Exception(' <span class="text-danger" style="font-size:25px">Minden mező kitöltése kötelező!</span><br> ');
        }
    }

    private function UpdateSaving_check($value){
        $stored = $this->stmt->select_goalforcheck($_SESSION['userId']);

        if($value < 0 && ($stored - abs($value)) < 0 ){

        throw new Exception(' <span class="text-danger" style="font-size:25px">Negatív értéke lesz az eddig félretett pénznek! Kérlek töröld a célt amennyibe már nem aktuális!</span> ');

        }
    }

    private function is_check($method){
        if(empty($method)){
            throw new Exception(' <span class="text-danger" style="font-size:25px">Kérem válasszon: Bank vagy Készpénz!</span><br> ');
        }
    }


    /* New-->SQL insert */
    public function add_transaction($category, $type, $method, $comment, $value) {
        $msg = "";
        session_start();

        $user_id = $_SESSION['userId'];

        try {
            $this->is_check($method);
            $this->is_empty($value);
            $this->comment_longcheck($comment);
            $this->numberformat_check($value);
            $this->numbernegative_check($value);

        }

        catch(Exception $e) {
            $msg .= $e->getMessage();
        }

        if($msg == "") {
            $msg .= (!$this->stmt->sql_newTransaction($user_id, $category, $type, $method, $comment, $value)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }

        $msg = ($msg == "") ?
        " <h5 class='text-success'>Hozzáadva</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;

    }

    public function add_Fixtransaction($category, $type, $method, $day, $comment, $value) {
        $msg = "";

        session_start();
        $user_id = $_SESSION['userId'];

        try {
            $this->is_check($method);
            $this->is_empty($value);
            $this->is_empty($day);
            $this->is_empty($comment);
            $this->numberformat_check($value);
            $this->numberformat_check($day);
            $this->numbernegative_check($value);
            $this->comment_longcheck($comment);
            $this->date_check($day);
        }

        catch(Exception $e) {
            $msg .= $e->getMessage();
        }


        if($msg == "") {
            $msg .= (!$this->stmt->sql_newFixTransaction($user_id, $category, $type, $method, $day, $comment, $value)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }

        $msg = ($msg == "") ?
        " <h5 class='text-success'>Hozzáadva</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;

    }

    public function user_AddBanned($product, $comment, $price){
        session_start();

        $user_id = $_SESSION['userId'];
        $msg = "";

        try {
            $this->numberformat_check($price);
            $this->numbernegative_check($price);
            $this->comment_longcheck($comment);
            $this->comment_longcheck($product);
        }

        catch(Exception $e) {
            $msg .= $e->getMessage();
        }

        if($msg == "") {
            $msg .= (!$this->stmt->sql_newBanned($user_id, $product, $comment, $price)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }

        $msg = ($msg == "") ?
        " <h5 class='text-success'>Hozzáadva</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;

    }

    public function user_AddGoal($goal, $store_of_money, $saving_for){
        session_start();

        $user_id = $_SESSION['userId'];
        $msg = "";

        try {
            $this->is_empty($goal);
            $this->is_empty($store_of_money);
            $this->is_empty($saving_for);
            $this->numberformat_check($goal);
            $this->numbernegative_check($goal);
            $this->numberformat_check($store_of_money);
            $this->numbernegative_check($store_of_money);
            $this->comment_longcheck($saving_for);
        }

        catch(Exception $e) {
            $msg .= $e->getMessage();
        }

        $msg .= ($this->stmt->SavingLimit_Check($user_id)) ? " <span class='text-danger'>Egy spórolási célt adhatsz meg!</span> " : "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_newSavingGoal($user_id, $goal, $store_of_money, $saving_for)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }

        $msg = ($msg == "") ?
        " <h5 class='text-success'>Hozzáadva</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;

    }

    public function user_AddEvent($event_name, $date, $comment){
        $msg = "";
        session_start();

        $user_id = $_SESSION['userId'];

        try {
            $this->is_empty($event_name);
            $this->comment_longcheck($event_name);
            $this->comment_longcheck($comment);
        }

        catch(Exception $e) {
            $msg .= $e->getMessage();
        }

        if($msg == "") {
            $msg .= (!$this->stmt->sql_newEvent($user_id, $event_name, $date, $comment)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }

        $msg = ($msg == "") ?
        " <h5 class='text-success'>Hozzáadva</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;

    }

    /* -->SQL Select*/

    public function user_data(){
        $row= $this->stmt->sql_SelectUserData($_SESSION['userId']);
        return $row;
    }

    public function user_balance(){
        $row= $this->stmt->sql_SelectBalance($_SESSION['userId']);
        return $row;
    }

    public function user_banned(){
        $row1= $this->stmt->sql_SelectBanned($_SESSION['userId']);
        return $row1;
    }

    public function sql_UserSaving(){
        $row= $this->stmt->sql_SelectSaving($_SESSION['userId']);
        return $row;
    }

    public function user_transactions(){
        $row= $this->stmt->sql_SelectTransactions($_SESSION['userId']);
        return $row;
    }

    public function user_OldTransactions(){
        $row= $this->stmt->sql_SelectOldTransactions($_SESSION['userId']);
        return $row;
    }

    public function user_fixtransactions(){
        $row= $this->stmt->sql_SelectFixTransactions($_SESSION['userId']);
        return $row;
    }

    public function user_Event(){
        $row= $this->stmt->sql_SelectEvent($_SESSION['userId']);
        return $row;
    }

    public function user_MontlyBudget(){
        $row= $this->stmt->sql_SelectMonthMoney($_SESSION['userId']);
        return $row;
    }

    public function user_OldMontlyBudget(){
        $row= $this->stmt->sql_SelectOldMonthMoney($_SESSION['userId']);
        return $row;
    }

    public function categories_outgoing(){
        $row= $this->stmt->sql_SelectCategories_outgoing();
        return $row;
    }

    public function categories_incoming(){
        $row= $this->stmt->sql_SelectCategories_incoming();
        return $row;
    }


    /* -->SQL DELETE*/
    public function delete_profile(){
        session_start();

        $user_id = $_SESSION['userId'];
        $msg = "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_DeleteAccount($user_id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Törölve</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

    public function user_deleteTransactions($id){
        $msg = "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_DeleteTransaction($id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Törölve</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

    public function user_deleteAllTransactions(){
        Session_start();

        $user_id = $_SESSION['userId'];
        $msg = "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_DeleteAllTransaction($user_id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Törölve</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

    public function user_deleteAllFixTransactions(){
        Session_start();

        $user_id = $_SESSION['userId'];
        $msg = "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_DeleteAllFixTransaction($user_id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Törölve</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

    public function user_delete_Banned($id){
        $msg = "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_DeleteBanned($id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Törölve</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

    public function user_delete_AllBanned(){
        Session_start();

        $user_id = $_SESSION['userId'];
        $msg = "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_DeleteAllBanned($user_id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Törölve</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

    public function user_deleteEvent($id){
        $msg = "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_DeleteEvent($id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Törölve</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

    public function user_deleteAllEvent(){
        Session_start();

        $user_id = $_SESSION['userId'];
        $msg = "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_DeleteAllEvent($user_id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Törölve</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }


    public function user_deleteSaving(){
        $msg = "";
        Session_start();

        $user_id = $_SESSION['userId'];


        if($msg == "") {
            $msg .= (!$this->stmt->sql_DeleteSaving($user_id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Törölve</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

    public function user_deleteFixTransactions($id){
        $msg = "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_DeleteFixTransaction($id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Törölve</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }


    /* -->SQL Copy*/
    public function user_copyFixTransactions($id){
        $msg = "";

        if($msg == "") {
            $msg .= (!$this->stmt->sql_CopyFixtransaction($id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Sikeres Másolás</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

    public function user_copyAllFixTransactions(){
        $msg = "";
        Session_start();

        $user_id = $_SESSION['userId'];


        if($msg == "") {
            $msg .= (!$this->stmt->sql_CopyAllFixtransaction($user_id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <h5 class='text-success'>Sikeres Másolás</h5>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }


    /* -->SQL Update*/
    public function user_UpdateGoal1($value){
        $msg = "";

        Session_start();

        $user_id = $_SESSION['userId'];

        try {
            $this->is_empty($value);
            $this->numberformat_check($value);
            $this->UpdateSaving_check($value);
        }

        catch(Exception $e) {
            $msg .= $e->getMessage();
        }

        if($msg == "") {
            $msg .= (!$this->stmt->sql_updategoal1($value, $user_id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <span class='text-success' style='font-size:25px'>Hozzáadva</span>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

    public function user_UpdateGoal2($value){
        $msg = "";

        Session_start();

        $user_id = $_SESSION['userId'];

        try {
            $this->is_empty($value);
            $this->numberformat_check($value);
            $this->UpdateSaving_check($value);
        }

        catch(Exception $e) {
            $msg .= $e->getMessage();
        }

        if($msg == "") {
            $msg .= (!$this->stmt->sql_updategoal2($value, $user_id)) ? " <span class='text-danger' style='font-size:25px'>Váratlan hiba történt!</span> " : "";
        }
        $msg = ($msg == "") ?
        " <span class='text-success' style='font-size:25px'>Hozzáadva</span>"
        : "<ul>".$msg."</ul>";


        return $msg;
    }

}