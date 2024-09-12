<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketStats extends Model
{
    protected $table    = 'tb_ticket_stats';
    protected $fillable = ['ticket_id', 'status', 'created_at', 'created_by'];
}
