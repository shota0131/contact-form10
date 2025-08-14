<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['first_name','last_name', 'gender', 'email', 'tel', 'address', 'building', 'type', 'content'];



public function scopeNameSearch($query, $name)
{
    if (!empty($name)){
        $query->where('first_name', 'like', '%' . $name . '%')
        ->orWhere('last_name', 'like', '%' . $name)
        ->orWhereRaw("CONCAT(first_name, last_name) LIKE ?", ["%{$name}%"])
        ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$name}%"]);
    }
}
    public function scopeEmailSearch($query, $email, $exact = false)
    {
        if (!empty($email)) {
            $operator = $exact ? '=' : 'like';
            $value = $exact ? $email : "%{$email}%";
            return $query->where('email', $operator, $value);
        }
        return $query;
    }

   
    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            return $query->where('gender', $gender);
        }
        return $query;
    }

   
    public function scopeTypeSearch($query, $type)
    {
        if (!empty($type)) {
            return $query->where('type', $type);
        }
        return $query;
    }

    
    public function scopeDateSearch($query, $from, $to)
    {
        if (!empty($from) && !empty($to)) {
            return $query->whereBetween('created_at', [$from, $to]);
        } elseif (!empty($from)) {
            return $query->whereDate('created_at', '>=', $from);
        } elseif (!empty($to)) {
            return $query->whereDate('created_at', '<=', $to);
        }
        return $query;
    }
}





