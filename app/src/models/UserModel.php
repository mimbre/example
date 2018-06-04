<?php
namespace models;
use mimbre\db\DbActiveRecord;
use mimbre\db\mysql\MySqlConnection;

/**
 * A database model can extends a DbActiveRecord, which implements the
 * Active Record Pattern:
 *   https://en.wikipedia.org/wiki/Active_record_pattern
 *
 * Optionally, a database model can extends a DbRecord. But in that case you
 * have to manually implement the following methods:
 *
 *  DbRecord::delete();
 *  DbRecord::select();
 *  DbRecord::update();
 *  DbRecord::insert();
 *
 * Visit the class for more info:
 *   https://github.com/mimbre/db/blob/master/src/db/DbRecord.php
 */
class UserModel extends DbActiveRecord
{
    /**
     * Constructor.
     *
     * @param MySqlConnection $db Database connection
     * @param string          $id ID
     */
    public function __construct($db, $id = null)
    {
        parent::__construct($db, "user", $id);
    }

    /**
     * Searches an user by username.
     *
     * @param MySqlConnection $db       Database connection
     * @param string          $username Username
     *
     * @return UserModel
     */
    public static function searchByUsername($db, $username)
    {
        $ret = null;

        $sql = "
        select
            id
        from user
        where username = ?";
        $row = $db->query($sql, [$username]);
        if (count($row) > 0) {
            $ret = new UserModel($db, $row["id"]);
        }

        return $ret;
    }
}
