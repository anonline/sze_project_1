import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UploadeventComponent } from './uploadevent.component';

describe('UploadeventComponent', () => {
  let component: UploadeventComponent;
  let fixture: ComponentFixture<UploadeventComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UploadeventComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UploadeventComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
