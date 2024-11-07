<?php
require_once 'config/config.php';
require_once 'Model/user.php';
$db = new Database();
$user = new User($db->getConnection());
?>
<script src="https://cdn.tailwindcss.com"></script>
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
                <h2 class="font-semibold text-gray-800">Data Diri</h2>
                <a href="create.php" class='mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline'>Tambah Data</a>

            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">id</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">nama</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">alamat</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-right">aksi</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                        <?php
                        $no = 1;
                        foreach ($user->read() as $x) {
                            $id = $x["id"];
                            $nama = $x["nama"];
                            $alamat = $x["alamat"];

                            echo "
								<tr>
									<td class='p-2 whitespace-nowrap'>
										<div class='text-left'>$id</div>
									</td>
									<td class='p-2 whitespace-nowrap'>
										<div class='text-left'>$nama</div>
									</td>
									<td class='p-2 whitespace-nowrap'>
										<div class='text-left'>$alamat</div>
									</td>
									<td class='p-2 whitespace-nowrap text-right'>
										<a href=\"./edit.php?id=" . $id . "&nama=" . $nama . "&alamat=" . $alamat . "\" type='button' class='mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline'>Edit</a>
										<button onclick=\"if (confirm('yakin hapus ini?')) window.location.href = './delete_action.php?id=" . $id . "';\" type='button' class='text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline'>Delete</button>
									</td>
								</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
