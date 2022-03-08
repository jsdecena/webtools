<?php

namespace App\Http\Transformers;

use Illuminate\Support\Collection;

class PatientTransformer
{
    /**
     * Transform the given data into a structure easier for the consumer of the api to process
     *
     * @param array $item
     * @return array
     */
    public function transformOne(array $item): array
    {
        return $this->transform($item);
    }

    /**
     * Transform the given data into a structure easier for the consumer of the api to process
     *
     * @param array $data
     * @return Collection
     */
    public function transformMany(array $data): Collection
    {
        return collect($data)->transform(function ($item) {
            return $this->transform($item);
        });
    }

    /**
     * @param $item
     * @return array
     */
    private function transform($item): array
    {
        if (isset($item['resource'])) {
            return [
                'id' => $item['resource']['id'],
                'first_name' => isset($item['resource']) ? (isset($item['resource']['name'][0]['given']) ? $item['resource']['name'][0]['given'][0] : '-') : '-',
                'last_name' => isset($item['resource']) ? (isset($item['resource']['name']) ? $item['resource']['name'][0]['family'] : '-') : '-',
                'birth_date' => $item['resource']['birthDate'] ?? '-',
                'gender' => $item['resource']['gender'] ?? '-',
            ];
        }
        return [
            'id' => $item['id'],
            'first_name' => isset($item['name']) ? $item['name'][0]['given'][0] : '-',
            'last_name' => isset($item['name']) ? $item['name'][0]['family'] : '-' ,
            'birth_date' => $item['birthDate'] ?? '-',
            'gender' => $item['gender'] ?? '-',
        ];
    }
}
