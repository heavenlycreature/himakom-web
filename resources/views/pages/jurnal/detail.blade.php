@extends('components.layout.index')

@section('content')
<x-navbar/>
<!-- Main Content -->
<div class="container mx-auto px-6 py-10 flex justify-center items-center">
    <div class="flex flex-col w-full md:flex-row bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Box Kiri -->
        <div class="w-full h-[80vh] flex flex-col" id="pdfContainer" data-pdf-url="{{ asset('storage/' . $journal->pdf ) }}">
            <div class="flex-grow relative">
                <canvas id="pdfCanvas" class="absolute inset-0 w-full h-full object-contain"></canvas>
            </div>
            <div class="flex justify-evenly md:justify-between mt-4">
                <button id="prevPage" class="px-4 py-2 bg-purple-800 text-white rounded-lg">Previous</button>
                <span id="pageInfo" class="self-center"></span>
                <button id="nextPage" class="px-4 py-2 bg-purple-800 text-white rounded-lg">Next</button>
            </div>
        </div>
        <!-- Box Kanan -->
        <div class="w-full md:w-1/2 p-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ $journal->judul }}</h1>
            <p class="mt-4 text-gray-600">{{ $journal->tujuan }}</p>
            <button class="mt-6 px-4 py-2 bg-purple-800 text-white rounded-lg">Download</button>
        </div>
    </div>
</div>
<x-footer/>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    const pdfContainer = document.getElementById('pdfContainer');
    const pdfUrl = pdfContainer.getAttribute('data-pdf-url');
    const canvas = document.getElementById('pdfCanvas');
    const ctx = canvas.getContext('2d');
    const prevButton = document.getElementById('prevPage');
    const nextButton = document.getElementById('nextPage');
    const pageInfo = document.getElementById('pageInfo');

    let pdfDoc = null;
    let pageNum = 1;
    let pagesCount = 0;

    function renderPage(num) {
    pdfDoc.getPage(num).then(function(page) {
        const viewport = page.getViewport({ scale: 1 }); // Increase scale to improve quality
        const canvasContainer = canvas.parentElement;
        
        // Calculate the scale factors based on the container's size and the desired viewport size
        const scaleX = canvasContainer.clientWidth / viewport.width;
        const scaleY = canvasContainer.clientHeight / viewport.height;
        const scale = Math.min(scaleX, scaleY);
        
        const scaledViewport = page.getViewport({ scale: scale * 2 }); // Apply the improved scale factor

        canvas.height = scaledViewport.height;
        canvas.width = scaledViewport.width;

        const renderContext = {
            canvasContext: ctx,
            viewport: scaledViewport
        };

        page.render(renderContext);
    });

    pageInfo.textContent = `Page ${num} of ${pagesCount}`;
    prevButton.disabled = num <= 1;
    nextButton.disabled = num >= pagesCount;
}

    pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
        pdfDoc = pdf;
        pagesCount = pdf.numPages;
        renderPage(pageNum);

        prevButton.addEventListener('click', () => {
            if (pageNum <= 1) return;
            pageNum--;
            renderPage(pageNum);
        });

        nextButton.addEventListener('click', () => {
            if (pageNum >= pagesCount) return;
            pageNum++;
            renderPage(pageNum);
        });
    });

    // Disable right-click and text selection (as before)
    pdfContainer.oncontextmenu = () => false;
    pdfContainer.style.userSelect = 'none';

    // Prevent default behavior for common keyboard shortcuts (as before)
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && ['c', 'p', 's'].includes(e.key)) {
            e.preventDefault();
            return false;
        }
    });
});
</script>    
@endsection

