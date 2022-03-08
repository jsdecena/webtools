<?php

namespace App\Http\Transformers;

class PatientTransformer
{
    public static function transform(array $data)
    {
        return collect($data)->transform(function ($item) {
            return [
                'id' => $item['resource']['id'],
                'first_name' => isset($item['resource']['name']) ? $item['resource']['name'][0]['given'][0] : '-',
                'last_name' => isset($item['resource']['name']) ? ($item['resource']['name'][0]['family'] ?? '-') : '-',
                'birth_date' => $item['resource']['birthDate'] ?? '-',
                'gender' => strtoupper($item['resource']['gender']) ?? '-',
            ];
        });
    }
}
