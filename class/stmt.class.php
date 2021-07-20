<?php

require "database.class.php";

class Stmt extends Database{

    private $db_Con;

    public function __construct($host, $user, $pwd, $db_Name) {

        parent::__construct($host, $user, $pwd, $db_Name);

        $this->db_Con = parent::connect();

        $this->db_Con->query("SET NAMES utf8");

    }

    public function email_Check($email) {
        $stmt = $this->db_Con->prepare("SELECT COUNT(id) AS qty FROM account WHERE email LIKE ?");
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $result = $stmt->fetch();
        return ($result['qty'] > 0);

    }

    public function reg_newUser($f_name, $l_name, $email, $pwd) {
        $stmt = $this->db_Con->prepare("INSERT INTO account(f_name,l_name,email,pwd,reg_date) VALUES (?,?,?,?,now())");
        $stmt->bindParam(1, $f_name);
        $stmt->bindParam(2, $l_name);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $pwd);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");

    }

    public function login_DataCheck($email, $pwd) {
        $stmt = $this->db_Con->prepare("SELECT COUNT(id) AS qty FROM account WHERE email LIKE ? AND pwd LIKE ?");
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $pwd);
        $stmt->execute();
        $result = $stmt->fetch();
        return ($result['qty'] == 1);

    }

    public function pwd_matchCheck($user_id, $old_pwd) {
        $stmt = $this->db_Con->prepare("SELECT COUNT(id) AS qty FROM account WHERE id LIKE ? AND pwd LIKE ?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $old_pwd);
        $stmt->execute();
        $result = $stmt->fetch();
        return ($result['qty'] == 1);

    }

    public function get_UserId($email) {
        $stmt = $this->db_Con->prepare("SELECT id FROM account WHERE email LIKE ?");
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['id'];

    }


    public function get_PublicUserData($userId) {
        $stmt = $this->db_Con->prepare("SELECT f_name,email,pwd FROM account WHERE id=?");
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        return $stmt->fetch();

    }

    /* INSERT */

    public function sql_Balance($user_id,$bank,$cash) {
        $stmt = $this->db_Con->prepare("INSERT INTO balance(user_id,bank,cash,up_date) VALUES (?,?,?,now())");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $bank);
        $stmt->bindParam(3, $cash);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");

    }

    public function sql_new_pwd($pwd,$user_id) {
        $stmt = $this->db_Con->prepare("UPDATE account SET pwd=? WHERE id=?");
        $stmt->bindParam(1, $pwd);
        $stmt->bindParam(2, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");

    }

    public function sql_newTransaction($user_id, $category, $type, $method, $comment, $value) {
        $stmt = $this->db_Con->prepare("INSERT INTO transaction(user_id ,category, type, method, comment, value, date) VALUES (?,?,?,?,?,?,now())");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $category);
        $stmt->bindParam(3, $type);
        $stmt->bindParam(4, $method);
        $stmt->bindParam(5, $comment);
        $stmt->bindParam(6, $value);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");

    }

    public function sql_newFixTransaction($user_id, $category, $type, $method, $day, $comment, $value) {
        $stmt = $this->db_Con->prepare("INSERT INTO fixed_transactions (user_id, category, type, method, day, comment, value, date) VALUES (?,?,?,?,?,?,?,now())");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $category);
        $stmt->bindParam(3, $type);
        $stmt->bindParam(4, $method);
        $stmt->bindParam(5, $day);
        $stmt->bindParam(6, $comment);
        $stmt->bindParam(7, $value);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");

    }

    public function sql_newBanned($user_id, $product, $comment, $price) {
        $stmt = $this->db_Con->prepare("INSERT INTO banned(user_id ,product, comment, price, date) VALUES (?,?,?,?,now())");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $product);
        $stmt->bindParam(3, $comment);
        $stmt->bindParam(4, $price);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");

    }

    public function sql_newSavingGoal($user_id, $goal, $store_of_money, $saving_for) {
        $stmt = $this->db_Con->prepare("INSERT INTO saving_goal(user_id ,goal, store_of_money, saving_for) VALUES (?,?,?,?)");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $goal);
        $stmt->bindParam(3, $store_of_money);
        $stmt->bindParam(4, $saving_for);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");

    }

    /* SELECT */

    //User data
    public function sql_SelectUserData($userId) {
        $stmt = $this->db_Con->prepare("SELECT f_name,l_name,email,reg_date FROM account WHERE id=?");
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        $data=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $data[]=$row;

           }
           return $data;
    }

    public function sql_SelectBalance($userId) {
        $stmt = $this->db_Con->prepare("SELECT bank,cash,(bank+cash) AS balance FROM balance WHERE user_id=?");
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        $data=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $data[]=$row;

           }
           return $data;
    }

    public function sql_SelectTransactions($userId) {
        $stmt = $this->db_Con->prepare("SELECT id, category, type, method, comment, value, date FROM transaction WHERE user_id=? AND MONTH(date) = MONTH(CURRENT_DATE())");
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        $data1=array();
        while($row1 = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $data1[]=$row1;

           }
           return $data1;
    }


    public function sql_SelectOldTransactions($userId) {
        $stmt = $this->db_Con->prepare("SELECT id, category, type, method, comment, value, date FROM transaction WHERE user_id=?
        AND MONTH(date) < MONTH(CURRENT_DATE()) AND YEAR(date)<=YEAR(CURRENT_DATE())");
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        $data=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $data[]=$row;

           }
           return $data;
    }

    public function sql_SelectFixTransactions($userId) {
        $stmt = $this->db_Con->prepare("SELECT id, category, type, method, day, comment, value FROM fixed_transactions WHERE user_id=?");
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        $fix=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $fix[]=$row;

           }
           return $fix;
    }

    public function sql_SelectMonthMoney($userId) {
        $stmt = $this->db_Con->prepare("SELECT SUM(CASE WHEN user_id=? AND MONTH(date) = MONTH(CURRENT_DATE()) THEN value END) AS total0, SUM(CASE WHEN type='+' AND user_id=? AND MONTH(date) = MONTH(CURRENT_DATE()) THEN value END) AS total, SUM(CASE WHEN type='-' AND user_id=? AND MONTH(date) = MONTH(CURRENT_DATE()) THEN value END) AS total1 FROM transaction");
        $stmt->bindParam(1, $userId);
        $stmt->bindParam(2, $userId);
        $stmt->bindParam(3, $userId);
        $stmt->execute();
        $incoming=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $incoming[]=$row;

           }
           return $incoming;
    }

    public function sql_SelectOldMonthMoney($userId) {
        $stmt = $this->db_Con->prepare("SELECT SUM(CASE WHEN type='+' AND user_id=? AND MONTH(date) < MONTH(CURRENT_DATE()) THEN value END) AS total, SUM(CASE WHEN type='-' AND user_id=? AND MONTH(date) < MONTH(CURRENT_DATE()) THEN value END) AS total1, date FROM transaction");
        $stmt->bindParam(1, $userId);
        $stmt->bindParam(2, $userId);
        $stmt->execute();
        $incoming=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $incoming[]=$row;

           }
           return $incoming;
    }

    public function sql_SelectBanned($userId) {
        $stmt = $this->db_Con->prepare("SELECT id,product,comment,price FROM banned WHERE user_id=?");
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        $ban=array();
        while($row1 = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $ban[]=$row1;

           }
           return $ban;
    }

    public function sql_SelectSaving($userId) {
        $stmt = $this->db_Con->prepare("SELECT id,goal,store_of_money,saving_for FROM saving_goal WHERE user_id=?");
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        $save=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $save[]=$row;

           }
           return $save;
    }

    public function sql_SelectEvent($userId) {
        $stmt = $this->db_Con->prepare("SELECT id,event_name,date,comment FROM events WHERE user_id=?");
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        $event=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $event[]=$row;

           }
           return $event;
    }

    public function SavingLimit_Check($user_id) {
        $stmt = $this->db_Con->prepare("SELECT COUNT(id) AS qty FROM saving_goal WHERE user_id LIKE ?");
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        $result = $stmt->fetch();
        return ($result['qty'] > 0);

    }

    public function sql_newEvent($user_id, $event_name, $date, $comment) {
        $stmt = $this->db_Con->prepare("INSERT INTO events(user_id ,event_name, date, comment) VALUES (?,?,?,?)");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $event_name);
        $stmt->bindParam(3, $date);
        $stmt->bindParam(4, $comment);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_SelectInformation() {
        $stmt = $this->db_Con->prepare("SELECT title,content,id FROM information");
        $stmt->execute();
        $info=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $info[]=$row;

           }
           return $info;
    }

    public function sql_SelectArticles() {
        $stmt = $this->db_Con->prepare("SELECT id,author,date,title,content FROM articles");
        $stmt->execute();
        $articles=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $articles[]=$row;

           }
           return $articles;
    }

    public function sql_SelectIDArticle($id) {
        $stmt = $this->db_Con->prepare("SELECT author,date,title,content FROM articles WHERE id=?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $articles_id=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $articles_id[]=$row;

           }
           return $articles_id;
    }

    public function sql_SelectCategories_outgoing() {
        $stmt = $this->db_Con->prepare("SELECT id,category FROM categories WHERE type='-'");
        $stmt->execute();
        $categories=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $categories[]=$row;

           }
           return $categories;
    }


    public function sql_SelectCategories_incoming() {
        $stmt = $this->db_Con->prepare("SELECT id,category FROM categories WHERE type='+'");
        $stmt->execute();
        $categories=array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {

            $categories[]=$row;

           }
           return $categories;
    }

    public function select_goalforcheck($userId) {
        $stmt = $this->db_Con->prepare("SELECT store_of_money FROM saving_goal WHERE user_id=?");
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['store_of_money'];

    }

    /* UPDATE */
    public function sql_UserUpdateName($f_name, $l_name, $user_id) {
        $stmt = $this->db_Con->prepare("UPDATE account SET f_name=?, l_name=?  WHERE id=?");
        $stmt->bindParam(1, $f_name);
        $stmt->bindParam(2, $l_name);
        $stmt->bindParam(3, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");

    }

    public function sql_UserUpdateEmail($email, $user_id) {
        $stmt = $this->db_Con->prepare("UPDATE account SET email=? WHERE id=?");
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");

    }

    public function sql_updategoal1($value, $user_id) {
        $stmt = $this->db_Con->prepare("UPDATE saving_goal SET store_of_money=(store_of_money+?)  WHERE user_id=?");
        $stmt->bindParam(1, $value);
        $stmt->bindParam(2, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_updategoal2($value, $user_id) {
        $stmt = $this->db_Con->prepare("UPDATE saving_goal SET store_of_money=(store_of_money-?)  WHERE user_id=?");
        $stmt->bindParam(1, $value);
        $stmt->bindParam(2, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    /* DELETE */
    public function sql_DeleteAccount($user_id) {
        $this->sql_DeleteAllTransaction($user_id);
        $this->sql_DeleteAllFixTransaction($user_id);
        $this->sql_DeleteAllBanned($user_id);
        $this->sql_DeleteAllEvent($user_id);
        $this->sql_DeleteSaving($user_id);
        $this->sql_Deletebalance($user_id);
        $stmt = $this->db_Con->prepare("DELETE FROM account WHERE id = ?");
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_Deletebalance($user_id) {
        $stmt = $this->db_Con->prepare("DELETE FROM balance WHERE user_id = ?");
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }
    public function sql_DeleteTransaction($id) {
        $stmt = $this->db_Con->prepare("DELETE FROM transaction WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_DeleteAllTransaction($user_id) {
        $stmt = $this->db_Con->prepare("DELETE FROM transaction WHERE user_id = ? AND MONTH(date) = MONTH(CURRENT_DATE())");
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_DeleteFixTransaction($id) {
        $stmt = $this->db_Con->prepare("DELETE FROM fixed_transactions WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_DeleteAllFixTransaction($user_id) {
        $stmt = $this->db_Con->prepare("DELETE FROM fixed_transactions WHERE user_id = ?");
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_DeleteBanned($id) {
        $stmt = $this->db_Con->prepare("DELETE FROM banned WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_DeleteAllBanned($user_id) {
        $stmt = $this->db_Con->prepare("DELETE FROM banned WHERE user_id = ?");
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_DeleteEvent($id) {
        $stmt = $this->db_Con->prepare("DELETE FROM events WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_DeleteAllEvent($user_id) {
        $stmt = $this->db_Con->prepare("DELETE FROM events WHERE user_id = ?");
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_DeleteSaving($user_id) {
        $stmt = $this->db_Con->prepare("DELETE FROM saving_goal WHERE user_id = ?");
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    //másolás
    public function sql_CopyFixtransaction($id) {
        $stmt = $this->db_Con->prepare("INSERT INTO transaction(user_id ,category, type, method, comment, value)
        SELECT user_id ,category, type, method, comment, value FROM fixed_transactions WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

    public function sql_CopyAllFixtransaction($user_id) {
        $stmt = $this->db_Con->prepare("INSERT INTO transaction(user_id ,category, type, method, comment, value)
        SELECT user_id ,category, type, method, comment, value FROM fixed_transactions WHERE user_id = ?");
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return ($stmt->errorCode() == "00000");
    }

}