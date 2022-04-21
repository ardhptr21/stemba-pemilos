<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    public function definition()
    {
        return [
            "slug" => $this->faker->slug(),
            "chairman" => $this->faker->name(),
            "vice_chairman" => $this->faker->name(),
            "motto" => $this->faker->sentence(rand(6, 10)),
            "vision" => $this->faker->paragraph(rand(3, 5)),
            "mission" => join("</li>", array_map(fn ($val) => "<li>$val", $this->faker->paragraphs(rand(5, 10)))) . "</li>",
            "image" => $this->faker->imageUrl(category: 'anime', width: 500, height: 700),
        ];
    }
}
