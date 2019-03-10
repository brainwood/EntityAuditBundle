<?php

namespace SimpleThings\EntityAudit\Comparator;

/**
 * Interface ComparatorInterface
 *
 * canCompare is always called before compare with the field and class mappings in case that data
 * is needed for the comparison it can be stored and used in the compare calculation
 *
 * @package SimpleThings\EntityAudit\Comparator
 */
interface ComparatorInterface
{
    //TODO need to update signature to add in event that is triggering compare and make comparators
    // able to run for each event? Should comparators register what events (delete, insert, update)
    // they aer able to handle and be gathered in those events? Yes just like Resolvers registering and
    // being organized
    /**
     * Given the new and old value return a boolean.
     * true if the change warrants a revision
     * false if the change does not warrant a revision
     *
     * @param $fieldName
     * @param $newValue
     * @param $oldValue
     * @return boolean
     */
    public function compare($fieldName, $newValue, $oldValue);

    /**
     * This gives you the data you need to make a decision on whether this class can compare the given values
     *
     * @param  ClassMetadata $classMetadata
     * @param  array         $fieldMapping
     * @param  string        $fieldName
     * @param  string        $revType    INS, UPD, DEL
     * @return boolean
     */
    public function canCompare($classMetadata, $fieldMapping, $fieldName, $revType);
}
