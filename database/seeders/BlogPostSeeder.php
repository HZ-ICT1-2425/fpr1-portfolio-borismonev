<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articlesData = [
            [
                'title' => 'Study Choice',
                'author' => 'Boris Monev',
                'short_description' => 'In this article I give the reasoning behind my study choice and go a bit more in depth about my interests in technology.',
                'text' => "I chose to study ICT because I am interested in technology as a whole. Hardware was always very interesting to me because I enjoy seeing how different components work simultaneously to create functional systems. The way these components interact - whether it's a processor, memory, or storage, gives me a sense of how technology powers everything around us in the modern world.
Software is the next step for me to understand how the instructions and code control the hardware, enabling it to perform complex tasks and bring ideas to life. Understanding both sides will allow me to see the full picture of how technology is developed, from design to implementation. I find it fascinating how innovation in this field continuously reshapes industries and improves daily life, and I want to be part of that process. By studying ICT, I’m preparing myself for a future where I can contribute to the ever-evolving world of technology, whether it’s building systems, solving problems, or creating new tools that help others.",
            ],
            [
                'title' => 'Personal SWOT analysis',
                'author' => 'Boris Monev',
                'short_description' => 'In this article I am writing about my strengths and weaknesses, also about the opportunities and threats that I see.',
                'text' => "First I am going to talk about the strengths that I think I have. Confidence is definitely not one of them, but I will talk more about that later. I believe one of my strengths is being a good listener. I prefer to talk less and listen more to others, because I learn a lot from what other people have to say on a certain topic and make a conclusion of their views. I then think about what I agree and disagree with. I learn a lot from watching others and I try to apply my observations to improve myself. I would also say I am an organized person. I like to keep my space tidy, because in a way it boosts my productivity and helps me feel better, because I know where everything is and I don't waste time trying to search for stuff.
Now for my weaknesses. Like I mentioned, confidence isn't really a strength of mine. I've been trying to push myself to get out of my comfort zone, which has definitely helped boost my confidence. Another weakness of mine is having a hard time focusing on certain things that are important, but don't interest me. For example doing homework. Sometimes I enjoy it a lot, but other times I try to sit down and do what I have to do, but it takes me a long time, because I can't focus. But I try to push through and complete the given assignment.
Now about the opportunities that I see. A question I don't understand fully, but I will try my best to answer. I would say that I make smart decisions and I never pass on opportunities such as, for example studying abroad, or getting a job. I try to be quick in my decision-making because it may result in either losing an opportunity or gaining one. I try to figure out the different options I have and make the choice that is the most benefitial.
The threats that I see. Another question I don't exactly know how to answer, but I will try. If we are talking about social life a threat I see is connecting with people who only pull me down and play no benefitial role in my life. Social media is a big threat in my opinion and I have always stayed away from it, and have only used it to share things with a small circle of friends. I most of the time can sense if things are wrong and I try to stay away from troublesome people or situations that would have a negative impact on me and the people I care about."
            ],
            [
                'title' => 'Programming experience',
                'author' => 'Boris Monev',
                'short_description' => 'In this article you can read about my programming experience. I aslo write about how I made this website.',
                'text' => "In the welcoming message on the main page of my website, I say that this is my first website ever, and that is true. The only experience I have had before starting the ICT programme was almost 6 years ago, when I went to an extracurricular course about game development. Firstly, there the programming language that we used was JavaScript. I don't remember anything from JavaScript and thats why I did not implement it into my website. I learned HTML and CSS from the FreeCodeCamp website, and in two weeks time this is the result. I think I did a good job. I wanted to spend more time on the design while not sacrificing the functionality of the website. I have knowledge in Photoshop, which I used to change the color of the HZ logo and some of the images, so that they fit the theme of the website. I had a lot of fun, it was very interesting, and I am super excited to continue learning how to code!"

            ]
            // Add more articles here if needed
        ];

        foreach ($articlesData as $data) {
            Articles::create([
                'title' => $data['title'],
                'author' => $data['author'],
                'short_description' => $data['short_description'],
                'text' => $data['text'],
                'uri' => Str::slug($data['title']), // Generate slug from title
            ]);
        }
    }
}
