<style>
	th, td {
		padding: 5px;
	}
	.num {
		mso-number-format: General;
	}
	.text {
		mso-number-format: "\@"; /* force text */
	}
</style>

<!-- Header Info -->
<table width="100%" style="border-collapse: collapse; border: 1px solid black; padding:20px; font-size: 10px;">
	<tr style="border: 1px solid black; background-color: grey;">
		<th style="text-align: center; width:50px;" colspan="10">
			DAFTAR SELURUH UMKM FUKUSKU
		</th>
	</tr>
</table>

<!-- Jadwal Table -->
<table width="100%" style="border-collapse: collapse; border: 1px solid black; padding:20px; font-size: 10px;">
	<tr style="border: 1px solid black; background-color: grey;">
		<th style="text-align: center; width:50px; border: 1px solid black;">NO</th>
		<th style="text-align: center; width:200px; border: 1px solid black;">NAMA LAPAK</th>
		<th style="width:150px; border: 1px solid black; text-align: center;">KATEGORI</th>
		<th style="width:100px; border: 1px solid black; text-align: center;">STATUS</th>
		<th style="width:250px; border: 1px solid black; text-align: center;">ADDRESS</th>
		<th style="width:100px; border: 1px solid black; text-align: center;">OPEN TIME</th>
		<th style="width:100px; border: 1px solid black; text-align: center;">CLOSE TIME</th>
		<th style="width:250px; border: 1px solid black; text-align: center;">EMAIL</th>
		<th style="width:150px; border: 1px solid black; text-align: center;">PHONE</th>
		<th style="width:300px; border: 1px solid black; text-align: center;">DESCRIPTION</th>
	</tr>

	@php $i = 1; @endphp
	@foreach($list as $val)
	<tr style="border: 1px solid black; background-color: grey;">
		<td style="text-align: center; border: 1px solid black;" valign="center">
			{{ $i }}
		</td>
		<td style="text-align: center; border: 1px solid black;" valign="center">
			{{ $val->name }}
		</td>
		<td class="text" style="border: 1px solid black; text-align: center;" valign="center">
			{{ $val->type }}
		</td>
		<td class="text" style="border: 1px solid black; text-align: center;" valign="center">
			{{ $val->status }}
		</td>
		<td class="text" style="border: 1px solid black; text-align: center;" valign="center">
			{{ $val->address }}
		</td>
		<td class="text" style="border: 1px solid black; text-align: center;" valign="center">
			{{ $val->open_time }}
		</td>
		<td class="text" style="text-align: center; border: 1px solid black;" valign="center">
			{{ $val->close_time }}
		</td>
		<td class="text" style="text-align: center; border: 1px solid black;" valign="center">
			{{ $val->email }}
		</td>
		<td class="text" style="text-align: center; border: 1px solid black;" valign="center">
			{{ $val->phone_number }}
		</td>
		<td class="text" style="text-align: center; border: 1px solid black;" valign="center">
			{{ $val->description }}
		</td>
	</tr>
	@php $i++; @endphp
	@endforeach
</table>
