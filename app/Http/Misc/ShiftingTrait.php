<?php
namespace SEEK\Http\Misc;

trait ShiftingTrait
{
    private $max_count = 0;
    private $count_find_p = 0;
    private $count_find_n = 0;

    private function index_shift($results, $Object)
    {
        $ObjectForCount = clone $Object;
        $this->max_count = $ObjectForCount->count();

        foreach ($results as $result) {
            $this->count_find_p = 0;
            $this->count_find_n = 0;
            $result->p_id = $this->findPrevIDBySeq($Object, $result->seq + 1);
            $result->n_id = $this->findNextIDBySeq($Object, $result->seq - 1);
        }
    }
    
    private function findPrevIDBySeq($Object, $seq)
    {
        $ObjectForPrev = clone $Object;
        $ObjectForPrev = $ObjectForPrev->where('seq', $seq)->first();

        if (!$ObjectForPrev) {
            $this->count_find_p++;

            if ($this->count_find_p <= $this->max_count) {
                return $this->findPrevIDBySeq($Object, $seq + 1);
            } else {
                return 0;
            }
        } else {
            return $ObjectForPrev->id;
        }
    }

    private function findNextIDBySeq($Object, $seq)
    {
        $ObjectForNext = clone $Object;
        $ObjectForNext = $ObjectForNext->where('seq', $seq)->first();

        if (!$ObjectForNext) {
            $this->count_find_n++;

            if ($this->count_find_n <= $this->max_count) {
                return $this->findNextIDBySeq($Object, $seq - 1);
            }
            else { 
                return 0;
            }
        } else {
            return $ObjectForNext->id;
        }
    }

    private function reorganizeSEQ($Object)
    {
        $ObjectForOrganize = clone $Object;
        $ObjectForOrganize = $ObjectForOrganize->orderBy('seq', 'asc')->get();
        $seq = 0;
        
        foreach ($ObjectForOrganize as $Obj) {
            $Obj->seq = ++$seq;
            $Obj->save();
        }
    }

    private function shifting($object, $id, $shift_id)
    {

        $object_1 = clone $object;
        $object_2 = clone $object;

        $object_1 = $object_1->where('id',$id)->first();        
        $object_2 = $object_2->where('id',$shift_id)->first();

        $seq1 = $object_1->seq;
        $seq2 = $object_2->seq;

        $object_1->seq = $seq2;
        $object_1->save();

        $object_2->seq = $seq1;
        $object_2->save();
    }
}
