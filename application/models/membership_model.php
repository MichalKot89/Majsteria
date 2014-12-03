<?php

/**
 * MembershipModel
 * Everything related to memberships
 */
class MembershipModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Check if someone is on membership
     * @param int $user_id
     * @return bool true if currently on membership
     */
    public function isOnMembership($user_id)
    {
        $sql = "SELECT membership_id FROM membership WHERE user_id = :user_id AND start_date < NOW() AND end_date > NOW()";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // fetch() is the PDO method that gets a single result
        return !empty($query->fetch());
    }

    /**
     * Return current membership info
     * @param int $user_id
     * @return object containing membership_id, start_date, end_date and membership_type
     */
    public function getCurrentMembershipInfo($user_id)
    {
        $sql = "SELECT membership_id, start_date, end_date, membership_type FROM membership WHERE user_id = :user_id AND start_date < NOW() AND end_date > NOW()";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // fetch() is the PDO method that gets a single result
        return $sth->fetch();
    }

    /**
     * Upgrade membership
     * @param user_id who upgraded membership
     * @param months upgrade membership for x months
     * @return bool feedback (was the membership upgraded properly ?)
     */
    public function upgradeMembership($user_id, $months = 1)
    {
        $sql = "INSERT INTO membership (membership_id, start_date, end_date, user_id, membership_type) VALUES (NULL, NOW(), DATE_ADD(NOW(), INTERVAL :months MONTH), :user_id, 0)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $_SESSION['user_id'], ':months' => $months));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["upgrade_negative"][] = MEMBERSHIP_UPGRADE_FAILED;
        }
        // default return
        return false;
    }

    /**
     * Renew membership
     * @param user_id who upgraded membership
     * @param months upgrade membership for x months
     * @return bool feedback (was the membership upgraded properly ?)
     */
    public function renewMembership($user_id, $months = 1)
    {
        // extend membership if has active membership
        if($this->isOnMembership($user_id)) {
            $membership_info = $this->getCurrentMembershipInfo($user_id);
            $sql = "UPDATE membership SET end_date = DATE_ADD(:end_date, INTERVAL :months MONTH) WHERE membership_id = :membership_id";
            $query = $this->db->prepare($sql);
            $query->execute(array(':membership_id' => $membership_info->membership_id, ':end_date' => $membership_info->end_date, ':months' => $months));

            $count =  $query->rowCount();
            if ($count == 1) {
                return true;
            }
        }
        // start new membership if no active memberships
        else {
            return $this->upgradeMembership($user_id, $months);
        }
        // default return
        return false;
    }

}
