{{-- resources/views/partials/modal-territory.blade.php --}}
<div id="{{ $modalId }}" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="modal-content bg-white rounded-lg p-8 max-w-6xl w-full max-h-[85vh] overflow-auto relative shadow-lg">
    <button class="modal-close absolute top-5 right-5 text-3xl font-bold cursor-pointer hover:text-red-600" aria-label="Close modal">&times;</button>
    <div class="flex flex-col md:flex-row gap-10">
      {{-- Left side: Map and Title --}}
      <div class="md:w-1/3 text-center">
        <h2 class="text-3xl font-extrabold mb-4">{{ $territory['name'] }}</h2>
        <img src="{{ asset($territory['map_image']) }}" alt="Peta wilayah {{ $territory['name'] }}" class="rounded-lg shadow-lg mx-auto max-h-[400px] w-auto" />
      </div>

      {{-- Right side: Detail sections --}}
      <div class="md:w-2/3">
        {{-- Opportunity Section --}}
      <h3 class="text-2xl font-bold text-red-600 mb-4">Opportunity</h3>
      <div class="border border-gray-300 rounded-lg p-4 mb-8">
        <div class="grid grid-cols-6 grid-rows-2 gap-x-8 gap-y-6">
          @foreach ($territory['opportunities'] as $opp)
            <div class="flex flex-col items-center text-center space-y-1">
              <img src="{{ asset($opp['icon']) }}" alt="{{ $opp['label'] }}" class="w-14 h-14 object-contain" />
              <span class="font-semibold text-sm uppercase tracking-wide">{{ $opp['label'] }}</span>
              <div class="text-sm text-gray-700">{{ $opp['count'] }}</div>
            </div>
          @endforeach
        </div>
      </div>

        {{-- OCC & Idle Port and Opp DGS --}}
        <div class="flex flex-col md:flex-row gap-12 mb-8">
          {{-- OCC & Idle Port --}}
          <div class="md:w-1/2">
            <h3 class="text-2xl font-bold text-red-600 mb-4">OCC & Idle Port</h3>
            <div class="bg-gray-50 border border-gray-300 rounded-lg p-4">
              <table class="w-full text-center border-collapse border border-gray-300 rounded-md">
                <thead>
                  <tr>
                    <th class="border border-gray-300 px-3 py-2 font-semibold">OCC</th>
                    <th class="border border-gray-300 px-3 py-2 font-semibold">Idle Port</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="border border-gray-300 px-3 py-2">{{ $territory['occ'] }}</td>
                    <td class="border border-gray-300 px-3 py-2">{{ $territory['idle_port'] }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          {{-- Opp DGS --}}
          <div class="md:w-1/2">
            <h3 class="text-2xl font-bold text-red-600 mb-4">Opp DGS</h3>
            <div class="border border-gray-300 rounded-md p-4 bg-gray-50">
              <ul class="list-disc list-inside text-gray-800 mb-0">
                @foreach ($territory['opp_dgs'] as $dgs)
                  <li>{{ $dgs }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>

        {{-- Resource Section --}}
        <div>
          <h3 class="text-2xl font-bold text-red-600 mb-4">Resource</h3>
          <div class="bg-gray-50 border border-gray-300 rounded-lg p-4">
            <table class="w-full text-left border-collapse border border-gray-300 rounded-md">
            <tbody>
              @foreach ($territory['resources'] as $res)
                <tr class="border-b border-gray-300 last:border-b-0">
                  <td class="px-4 py-2 border-r border-gray-300">{{ $res['jabatan'] }}</td>
                  <td class="px-4 py-2 text-center">{{ $res['jumlah'] }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
