import { TestBed } from '@angular/core/testing';

import { SermonHelperService } from './sermon-helper.service';

describe('SermonHelperService', () => {
  let service: SermonHelperService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(SermonHelperService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
