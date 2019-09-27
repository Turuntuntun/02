<?php
$id = $_POST['id'];
$result = json_decode(file_get_contents('../results/result.txt'),true);
$dataUser = $result[$id]['LINKS'];
if ($dataUser){
    $html = '<table>
            <tr>
                <th>Короткая ссылка</th>
                <th>Длинная ссылка</th>
                <th>Количество переходов</th>
            </tr>';
    foreach ($dataUser as $key => $value){
        $html .= '<tr>
                <td>
                    <a href ="'.$key.'">'.$key.'</a>
                </td>
                <td>'
            .$value['FULL_LINK'].'
                </td>
                <td>'
            .$value['COUNT'].'
                </td>
             </tr>';
    }
    $html .= '</table>';
    echo json_encode($html);
} else {
    echo json_encode('<p>У вас пока нет ссылок</p>');
}
