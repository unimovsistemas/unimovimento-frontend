import { TestBed } from '@angular/core/testing';

import { WishlistHelperService } from './wishlist-helper.service';

describe('WishlistHelperService', () => {
  let service: WishlistHelperService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(WishlistHelperService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
