import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-item-list',
  templateUrl: './item-list.component.html',
  styleUrls: ['./item-list.component.scss']
})
export class ItemListComponent implements OnInit {
  url = 'http://192.168.8.117/';
  value = '';
  edit = -1;
  titleValue = '';
  descriptionValue = '';
  imageValue = '';
  public data: any = [];
  constructor(private http: HttpClient) {
  }
  getData(){
    this.http.get(this.url+'?ID=JSON').subscribe((res)=>{
      this.data = res;
      console.log(this.data);
    })
  } 
  ngOnInit(): void {
    this.getData();
  }
  putData(i: any, title: any, description: any, image: any){
    this.edit = -1;
    const data = i+","+title+","+description+","+image;
    console.log(data);
    this.http.put(this.url+'?ID=PUT', data).subscribe((res)=>{
      this.getData();
    })
  }
  removeData(i: any){
    this.http.put(this.url+'?ID=REMOVE', i).subscribe((res)=>{
      this.getData();
    })
  }
  createData(i: any){
    console.log(i)
    this.http.put(this.url+'?ID=CREATE', i).subscribe((res)=>{
      this.getData();
    })
  }
}
