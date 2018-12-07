<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

<url>
  <loc>{{url("/")}}</loc>
  <lastmod>2018-07-11</lastmod>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>


@foreach($categories as $category)
   <url>
      <loc>{{url("/")."/category/".$category->slug}}</loc>
      <lastmod>{{$category->updated_at->format('Y-m-d')}}</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.9</priority>
   </url>
 @endforeach

@foreach($posts as $post)
   <url>
      <loc>{{url("/")."/".$post->category->slug."/".$post->slug}}</loc>
      <lastmod>{{$post->updated_at->format('Y-m-d')}}</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.9</priority>
   </url>
 @endforeach


 @foreach($users as $user)
   <url>
      <loc>{{url("/")."/author/".$user->slug}}</loc>
      <lastmod>{{$user->updated_at->format('Y-m-d')}}</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.7</priority>
   </url>
 @endforeach

</urlset> 
