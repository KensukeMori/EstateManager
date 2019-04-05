<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Room Controller
 *
 * @property \App\Model\Table\RoomTable $Room
 *
 * @method \App\Model\Entity\Room[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoomController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $room = $this->paginate($this->Room);

        $this->set(compact('room'));
    }

    /**
     * View method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $room = $this->Room->get($id, [
            'contain' => []
        ]);

        $this->set('room', $room);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $room = $this->Room->newEntity();
        if ($this->request->is('post')) {
            $room = $this->Room->patchEntity($room, $this->request->getData());
            if ($this->Room->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $this->set(compact('room'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $room = $this->Room->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $room = $this->Room->patchEntity($room, $this->request->getData());
            if ($this->Room->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $this->set(compact('room'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $room = $this->Room->get($id);
        if ($this->Room->delete($room)) {
            $this->Flash->success(__('The room has been deleted.'));
        } else {
            $this->Flash->error(__('The room could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    //検索画面用にDBから変数を取得するコントローラー
    public function search(){
        //他テーブルのモデルを取得
        $this->loadModel('Station');
        $this->loadModel('Roomtype');

        //チェックボックス用に駅名を取得
        $stationArrayForSearch = $this->Station->find('all')->extract('stationName')->toArray();

        //チェックボックス用にルームタイプを取得
        $roomTypeArrayForSearch = $this->Roomtype->find('all')->extract('roomType')->toArray();

        //並び替えの選択肢
        $sortTypeArray = ['賃料', '広さ'];

        //Viewに変数を引き渡す
        $this->set('stationArray', $stationArrayForSearch);
        $this->set('roomTypeArray', $roomTypeArrayForSearch);
        $this->set('sortType', $sortTypeArray);
    }

    public function result(){

        //モデルをロードし、他コントローラのテーブルも使えるようにする
        $this->loadModel('Building');
        $this->loadModel('Station');
        $this->loadModel('Roomtype');

        //データベースからデータを取得
        $roomQuery      = $this->Room->find('all')
                                    ->join([
                                        'table' => 'Building',
                                        'alias' => 'bld',
                                        'type' => 'LEFT',
                                        'conditions' => 'bld.buildingId = Room.building'
                                    ])->select([
                                        'roomId' => 'Room.roomId',
                                        'roomName' => 'Room.roomName',
                                        'building' => 'Room.building',
                                        'roomSize' => 'Room.roomSize',
                                        'roomType' => 'Room.roomType',
                                        'rent' => 'Room.rent',
                                        'resident' =>'Room.resident',
                                        'stationId' => 'bld.nearbyStation'
                                    ]);
        
        $buildingQuery  = $this->Building->find('all');
        
        //絞り込み条件の取得
        //searchアクションのPOSTを受け取る
        if(isset($this->request->data['maxRent'])){
            $maxRent = $this->request->data['maxRent'];
        }
        if(isset($this->request->data['minRent'])){
            $minRent = $this->request->data['minRent'];
        }

        if(isset($this->request->data['maxSize'])){
            $maxSize = $this->request->data['maxSize'];
        }
        if(isset($this->request->data['minSize'])){
            $minSize = $this->request->data['minSize'];
        }

        //DBのroomTypeId、stationIdは1から始まるのでPOSTの値を変換
        if(!empty($this->request->data['roomType'])){
            $roomTypeChecklist = array();
            $roomTypeRequest = $this->request->data['roomType'];
            foreach($roomTypeRequest as $r){
                $roomTypeChecklist[] = $r + 1;
            }
        }

        if(!empty($this->request->data['station'])){
            $stationChecklist = array();
            $stationRequest = $this->request->data['station'];
            foreach($stationRequest as $s){
                $stationChecklist[] = $s + 1;
            }
        }
       
        /*
            [絞り込み]
            ・Roomテーブルのレコードについて絞り込みを行う   
            賃料            min/max Roomテーブル rent
            部屋の大きさ     min/max Roomテーブル roomSize  

            ルームタイプ    checkbox Roomテーブル roomTypeId （-> Roomtype roomType）
            最寄り駅        checkbox Roomテーブル buildingId -> Buildingテーブル nearbyStation (Id)
                                                            (-> Stationテーブル　stationName)
        */


        //絞り込み処理
            //賃料・部屋の大きさ
        if(!empty($maxRent)){
            $roomQuery = $roomQuery->where(['rent <='=>$maxRent]);
        }
        if(!empty($minRent)){
            $roomQuery = $roomQuery->where(['rent >='=>$minRent]);
        }
        if(!empty($maxSize)){
            $roomQuery = $roomQuery->where(['roomSize <='=>$maxSize]);
        }
        if(!empty($minSize)){
            $roomQuery = $roomQuery->where(['roomSize >='=>$minSize]);
        }
        
            //ルームタイプ
        if(isset($roomTypeChecklist)){
            $roomQuery = $roomQuery->andWhere(['roomType'=>$roomTypeChecklist[0]]);
            for($i = 1; $i < count($roomTypeChecklist); $i++){
                $roomQuery = $roomQuery->orWhere(['roomType'=>$roomTypeChecklist[$i]]);
            }
        }

        $roomQuery2 = clone $roomQuery;
        $roomQuery2 = $roomQuery2->toArray();

            //最寄り駅
            //BuildingテーブルのstationIdと照合
        if(isset($stationChecklist)){
            $roomQuery = $roomQuery->andWhere(['bld.nearbyStation'=>$stationChecklist[0]]);
            for($i = 1; $i < count($stationChecklist); $i++){
                $roomQuery = $roomQuery->orWhere(['bld.nearbyStation'=>$stationChecklist[$i]]);
            }
        }

        /*
            [並び替え]
            種別：賃料 / 広さ　-> sortType
            順序：昇順 / 降順　-> sortOrder
        */

        //並び替え情報の取得
        $sortTypeIndex   = $this->request->data['sortType'];
        $sortOrderIndex  = $this->request->data['sortOrder'];

        //roomテーブルの表記で並び替え基準項目を設定
        if($sortTypeIndex == 0){
            $sortType = 'rent';
        }else{
            $sortType = 'roomSize';
        }

        //並び替えして配列化
        if ($sortOrderIndex == 0){
            $roomArray = $roomQuery  ->order([$sortType => 'ASC'])
                                            ->toArray();
        }else{
            $roomArray = $roomQuery  ->order([$sortType => 'DESC'])
                                            ->toArray();
        }

        //View引き渡すため、roomTypeなどをIDから表示名に変換するためのリスト
        $stationName = $this->Station->find('all')->extract('stationName')->toArray();
        $roomType    = $this->Roomtype->find('all')->extract('roomType')->toArray();

        //Viewに引き渡したい形の配列に変換
        $buildingArray = array();
        $currentBuildingId = null; //前後の項目で同一建物か判別するために用いる
        $eachBuilding = array(); 
        if(!empty($roomArray)){
            foreach($roomArray as $room){
                if($room['building'] != $currentBuildingId){
                    //前の建物情報を建物配列に加えて次の建物に変更
                    if($currentBuildingId != null){ 
                        $buildingArray[] = $eachBuilding; //初回は無視
                        $eachBuilding = array();
                    }
                    $currentBuildingId = $room['building'];
    
                    //クエリを複製してbildingIdで検索
                    $buildingQueryCloned = clone $buildingQuery;
                    $buildingQueryCloned = $buildingQueryCloned
                                            ->where(['buildingId'=>$currentBuildingId])
                                            ->toArray();
    
                    //Viewに引き渡したいデータのみを表示名で挿入
                    $eachBuilding['building'] = array(
                        'buildingName' => $buildingQueryCloned[0]['buildingName'],
                        'nearbyStation' => $stationName[$buildingQueryCloned[0]['nearbyStation'] - 1],
                        'distance'      => $buildingQueryCloned[0]['distance']
                    );
    
                    $eachBuilding['rooms'] = array();
                }
                //部屋情報を表示名で配列に追加
                $eachBuilding['rooms'][] = array(
                    'roomName' => $room['roomName'],
                    'rent' => $room['rent'],
                    'roomType' => $roomType[$room['roomType'] - 1],
                    'roomSize' => $room['roomSize']
                );
            }
            //最後の建物分を追加
            $buildingArray[] = $eachBuilding;
        }

        //インデックスから表示名に変換するための配列
        $sortType = ['賃料', '広さ'];
        $sortOrder = ['昇順', '降順'];

        //Viewへの引き渡し
        $this->set('buildingArray', $buildingArray);
        $this->set('sortType', $sortType[$sortTypeIndex]);
        $this->set('sortOrder', $sortOrder[$sortOrderIndex]);
    }
}
