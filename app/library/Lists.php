<?php

class Lists extends SingletonAbstract
{
    
    public static function getAllLists()
    {
        //return ALL of the LISTS! 
        return DB::table('list')
            ->get();
    }
    
   public static function getLists($limit, $offset, $orderBy)
    {
        return DB::table('list')
            ->grab($limit)
            ->offset($offset)
            ->order_by('id', $orderBy)
            ->get();
    }
    
    public static function getListById($listId)
    {
        return DB::table('list')
            ->where('id','=',$listId)
            ->grab(1)
            ->get();
    }
    
    /*
     *
     * List Categories
     *
    */ 
    
    public static function getAllListCategories()
    {
        //return all of the clients in the clients table
        return DB::table('list_categories')
            ->get();
    }

    public static function getListCategoryById($categoryId)
    {
        return DB::table('list_categories')
            ->where('id','=',$categoryId)
            ->grab(1)
            ->get();
    }
}
