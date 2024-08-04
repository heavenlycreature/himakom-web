          <article data-aos="zoom-in-up"  data-aos-once="true" data-aos-delay="{{ $loop * 2 }}"
           class="flex max-w-lg flex-col items-start gap-1">
             <div class="thumbnail rounded-sm">
                  <img src={{ $img }} class="object-cover h-48 w-96 rounded-sm" alt="thumbnail" />
              </div>
            <div class="flex items-center gap-x-4 text-xs">
              <time dateTime={{ $publish }} class="text-slate-200">
                {{ $publish }}
              </time> 
            </div>
            <div class="group relative">
              <h3 class=" text-base font-semibold leading-6 text-white group-hover:text-gray-300">
                <a href="/{{ $slug }}">
                  <span class="inset-0">
                      {{ $title }}
                    <span/>
                </a>
              </h3>
              <p class="mt-2 line-clamp-3 text-sm leading-6 text-gray-200">{{ $excerpt }}</p>
            </div>
            {{-- <div class="relative mt-8 flex items-center gap-x-4">
              <img src={ava} alt={post.user.username} class="h-10 w-10 rounded-full bg-gray-50" loading='lazy' />
              <div class="text-sm leading-6">
                <p class="font-semibold text-gray-100">
                  <a href={post.user.username}>
                    <span class="absolute inset-0" />
                    {post.user.name}
                  </a>
                </p>
                {/* <p class="text-gray-600">{post.author.role}</p> */}
              </div>
            </div> --}}
          </article>    