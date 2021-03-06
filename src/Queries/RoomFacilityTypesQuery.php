<?php

namespace BookingCom\Queries;

use BookingCom\Queries\QueryFields\WhereInQueryField;
use BookingCom\Queries\QueryFields\WithArrayQueryField;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;
use BookingCom\Queries\Validators\StringValidator;

/**
 * @method $this whereRoomFacilityTypeIdsIn(array $values)
 * @method $this whereFacilityTypeIdsIn(array $values)
 * @method $this withLanguages(array $values)
 * @method $this whereTypesIn(array $values)
 */
class RoomFacilityTypesQuery extends AbstractQuery
{
    public const ROOM_FACILITY_TYPES_RESULT_TYPES = ['string', 'boolean', 'integer'];

    /**
     * @return array
     */
    protected function fields(): array
    {
        return [
            'facility_type_ids'      => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'room_facility_type_ids' => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'types'                  => [
                'operation' => [WhereInQueryField::class],
                'validator' => [OneOfValidator::class, ['values' => self::ROOM_FACILITY_TYPES_RESULT_TYPES]],
            ],
            'languages' => [
                'operation' => [WithArrayQueryField::class],
                'validator' => [StringValidator::class, ['length' => 2]],
            ],
        ];
    }
}
