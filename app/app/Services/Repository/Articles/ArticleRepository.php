<?php
namespace App\Services\Repository\Articles;

use App\Models\Articles;
use App\Services\Object\Articles\FilterArticles;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function list(FilterArticles $params): LengthAwarePaginator
    {
        $language = $params->language;
        $source_id = $params->source_id;
        $author_id = $params->author_id;
        $category_id = $params->category_id;
        $tag_id = $params->tag_id;
        $description = $params->description;
        $start_date = $params->start_date;
        $end_date = $params->end_date;
        $query = Articles::with([
            'infos' => function($query) use($language){
                if($language) $query->where(['lang' => $language ]);
            },
            'tags:id,name',
            'author:id,name',
            'categories:id,name',
            'source:id,name',
            'media'
        ]);
        if($tag_id)
        {
            $query = $this->filterTag($query,$tag_id);
        }
        if($description)
        {
            $query = $this->filterTitle($query,$description, $tag_id);
            $query = $this->filterDescription($query,$description, true);
        }
        if($language)
        {
            $query = $this->filterLanguage($query,$language,$tag_id || $description);
        }
        
        if($category_id)
        {
            $query = $this->filterCategory($query,$category_id,$tag_id || $description|| $language );
        }
        if($source_id){
            $query = $this->filterSource($query,$source_id, $tag_id ||$category_id ||$description || $language);
        }
        if($author_id){
            $query = $this->filterAuthor($query, $author_id, $source_id || $tag_id || $category_id || $description || $language);
        }

        if($start_date || $end_date){
            $query = $this->filterDate($query,$start_date,$end_date);
        }

        $query = $query->select('*')->orderBy('created_at', 'desc')->paginate(10);
        
        return $query;
    }

    private function filterTitle($query,$description,bool $hasPreviousWhere = false)
    {
        if($hasPreviousWhere){
            $query->orWhere('title','like','%'.$description.'%');
        }
        else{
            $query->where('title','like','%'.$description.'%');
        }
        return $query;
    }
    private function filterSource($query,$source_id,bool $hasPreviousWhere = false)
    {
        if($hasPreviousWhere){
            $query->orWhere('source_id',$source_id);
        }
        else{
            $query->where('source_id',$source_id);
        }
        return $query;
    }

    private function filterAuthor($query,$author_id, bool $hasPreviousWhere = false)
    {
        if($hasPreviousWhere){
            $query->orWhere('author_id',$author_id);
        }
        else{
            $query->where('author_id',$author_id);
        }
        return $query;
    }

    private function filterTag($query,$tag_id , bool $hasPreviousWhere =false)
    {
        if($hasPreviousWhere)
        {
            $query->orWhereHas('tags',function($tags)use($tag_id){
                $tags->where('tags.id',$tag_id);
            });
        }
        else{
            $query->whereHas('tags',function($tags)use($tag_id){
                $tags->where('tags.id',$tag_id);
            });
        }
        
        return $query;
    }

    private function filterCategory($query,$category_id , bool $hasPreviousWhere =false)
    {
        if($hasPreviousWhere)
        {
            $query->orWhereHas('categories',function($categories)use($category_id){
                $categories->where('categories.id',$category_id);
            });
        }
        else{
            $query->whereHas('categories',function($categories)use($category_id){
                $categories->where('categories.id',$category_id);
            });
        }
        
        return $query;
    }
    private function filterLanguage($query,$language , bool $hasPreviousWhere =false)
    {

        if($hasPreviousWhere)
        {
            $query->orWhereHas('infos',function($infos)use($language){
                $infos->where('lang',$language);
            });
        }
        else{
            $query->whereHas('infos',function($infos)use($language){
                $infos->where('lang',$language);
            });
        }
        
        return $query;
    }

    private function filterDescription($query,$description , bool $hasPreviousWhere =false)
    {

        if($hasPreviousWhere)
        {
            $query->orWhereHas('infos',function($infos)use($description){
                $infos->where('description','like','%'.$description.'%');
            });
        }
        else{
            $query->whereHas('infos',function($infos)use($description){
                $infos->where('description','like','%'.$description.'%');
            });
        }
        
        return $query;
    }
    private function filterDate($query,$start_date,$end_date)
    {
        if($start_date)
        {
            $query = $query->whereDate('created_at', '>=', $start_date);
        }
        if($end_date)
        {
            $query = $query->whereDate('created_at', '<=', $end_date);
        }
        return $query;
    }
}