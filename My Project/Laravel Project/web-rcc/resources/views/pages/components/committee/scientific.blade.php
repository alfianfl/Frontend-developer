<section id="scientific-committee" class="mt-5">
  <div class="container-fluid mt-5">
    <h4>Scientific Committee</h4>
    <div class="row">
      <div class="col-12">
        <div class=" mx-sm-0 mx-lg-5">
          {{-- tabel committee --}}
          <table class="table table-stripe text-center">
            <tbody>
              @foreach ($commite as $item)
              <tr>
                <td scope="row">{{$item->name}}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>