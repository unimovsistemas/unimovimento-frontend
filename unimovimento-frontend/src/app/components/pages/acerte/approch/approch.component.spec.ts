import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ApprochComponent } from './approch.component';

describe('ApprochComponent', () => {
  let component: ApprochComponent;
  let fixture: ComponentFixture<ApprochComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ApprochComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ApprochComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
