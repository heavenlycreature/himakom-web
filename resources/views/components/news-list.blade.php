          <article data-aos="zoom-in-up"  data-aos-once="true" data-aos-delay="{{ $loop * 2 }}"
           class="flex max-w-lg flex-col items-start gap-1">
             <div class="thumbnail rounded-sm">
                  @if ($img)
                  <img src={{ asset('storage/' . $img) }} class="object-cover h-48 w-96 rounded-sm" alt="thumbnail" />
                  @else
                  <img src={{ $img }} class="object-cover h-48 w-96 rounded-sm" alt="thumbnail" />
                  @endif
              </div>
            <div class="flex items-center gap-x-4 text-xs">
              <time dateTime={{ $publish }} class="text-slate-200">
                {{ $publish }}
              </time> 
            </div>
            <div class="group relative">
              <h3 class=" text-base font-semibold leading-6 text-white group-hover:text-gray-300">
                <a href="{{ route('artikel.show', $slug) }}">
                  <span class="inset-0">
                      {{ $title }}
                    <span/>
                </a>
              </h3>
              <p class="mt-2 line-clamp-3 text-sm leading-6 text-gray-200">{{ $excerpt }}</p>
            </div>
          </article>    