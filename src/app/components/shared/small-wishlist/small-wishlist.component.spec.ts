import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SmallWishlistComponent } from './small-wishlist.component';

describe('SmallWishlistComponent', () => {
  let component: SmallWishlistComponent;
  let fixture: ComponentFixture<SmallWishlistComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SmallWishlistComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SmallWishlistComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
